<template>
    <div>
      <div v-if="gene">
        {{gene.symbol}}
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'IndexPage',
    async asyncData({$axios, params}){
      const gene = await $axios.$get(`http://192.168.1.26:200/gene/${params.gene}`)
      return { gene }
    }
  
  }
  </script>