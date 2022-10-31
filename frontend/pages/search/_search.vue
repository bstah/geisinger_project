<template>
  <div>
    <ul>
      <li v-for="gene in genes">{{gene}}</li>
    </ul>
  </div>
</template>
  
  <script>
  export default {
    name: 'IndexPage',
    async asyncData({$axios, params}){
      const genes = await $axios.$get(`http://192.168.1.26:200/search/${params.search}`)
      return { genes }
    }
  }
  </script>
  