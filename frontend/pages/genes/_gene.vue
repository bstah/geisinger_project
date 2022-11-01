<template>
    <div>
      <div v-if="gene">
        <h1 class="mb-3">{{gene.symbol}}</h1>
        <b-row class="mb-2">
          <b-col cols="3"><b>HGNC Symbol</b></b-col>
          <b-col>{{gene.symbol}} ({{gene.hgncId}})</b-col>
        </b-row>
        <b-row class="mb-2" v-if="gene.name">
          <b-col cols="3"><b>HGNC Name</b></b-col>
          <b-col>{{gene.name}}</b-col>
        </b-row>
        <b-row class="mb-2" v-if="gene.location">
          <b-col cols="3"><b>Location</b></b-col>
          <b-col>{{gene.location}}</b-col>
        </b-row>
        <b-row class="mb-2" v-if="gene.type">
          <b-col cols="3"><b>Gene Type</b></b-col>
          <b-col>{{gene.type}}</b-col>
        </b-row>
        <b-row class="mb-2" v-if="gene.previousSymbols">
          <b-col cols="3"><b>Previous Symbols</b></b-col>
          <b-col>{{gene.previousSymbols}}</b-col>
        </b-row>
        <b-row v-if="gene.aliasSymbols">
          <b-col cols="3"><b>Alias Symbols</b></b-col>
          <b-col>{{gene.aliasSymbols}}</b-col>
        </b-row>
      </div>
      <div v-else>
        <h1>Could Not Find Gene</h1>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'IndexPage',
    async asyncData({$axios, params}){
      const gene = await $axios.$get(`http://192.168.1.26/api/gene/${params.gene}`)
      return { gene }
    }
  
  }
  </script>