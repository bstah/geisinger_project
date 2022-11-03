<template>
    <div>
      <VueTypeaheadBootstrap
        class="mb-4"
        v-model="query"
        :data="genes"
        :serializer="item => item.symbol"
        placeholder="Search Gene By Symbol"
        prepend="Gene:"
        @input="searchGenes"
        @keyup.enter="handleEnter"
        :minMatchingChars="2"
      >
        <template slot="append">
          <button  class="btn btn-primary" @click="handleEnter">
            Search
          </button>
        </template>
        <template slot="suggestion" slot-scope="{data}">
            <div class="search-item" @click="handleSelectedSymbol(data)">
                {{data.symbol}}
            </div>
        </template>
      </VueTypeaheadBootstrap>
    </div>
  </template>
  
  <script>
    import {debounce} from 'lodash';
    import VueTypeaheadBootstrap from 'vue-typeahead-bootstrap'
    export default {
      data(){
        return {
          query: '',
          genes: []
        }
      },

      components: {
        VueTypeaheadBootstrap
      },
  
      methods: {
        handleEnter: function(event){
            
          if(this.genes.length > 0 && this.query.toUpperCase() == this.genes[0].symbol){
            this.handleSelectedSymbol(this.genes[0])
          }else if(this.query.length > 0){
            window.location.href = `/search/${this.query}`
          }
        },
        handleSelectedSymbol: function(event){
            window.location.href = `/genes/${event.id}`
        },
        searchGenes: debounce(async function() {
            if(this.query && this.query.length > 1){
            const data = await this.$axios.get(`http://192.168.1.26/api/search/${this.query}`)
            if(data && data.data)
                this.genes = data.data;
            else
                this.genes = [];
            }else{
                this.genes = [];
            }
        })
    }
    }
  </script>
  <style>
    a.list-group-item{padding: 0 !important;}
    .search-item{margin: 0.75rem 1.25rem;}
  </style>