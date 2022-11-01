<template>
  <div>
    <b-table :items="genes" :fields="fields" @row-clicked="handleClick"></b-table>
  </div>
</template>
  
  <script>
  export default {
    name: 'IndexPage',
    async asyncData({$axios, params}){
      const genes = await $axios.$get(`http://192.168.1.26/api/search/${params.search}`)
      return { genes }
    },
    data(){
      return{
        fields:[
          {key: 'symbol'},
          {key: 'hgncId'},
          {key: 'name'},
          {key: 'location'},
          {key: 'type'},
          {key: 'previousSymbols'},
          {key: 'aliasSymbols'}
        ]
      }
    },
    methods: {
      handleClick: function(event){
        window.location.href = `/genes/${event.id}`
      }
    }
  }
  </script>
  <style>tbody tr{cursor: pointer;}</style>
  