<template>
  <div>
    <Search/>
  </div>
</template>

<script>
import Search from '../components/Search.vue'
export default {
  name: 'IndexPage',
  components: {
    Search
  },
  data(){
    return{
      search: ''
    }
  }
}
</script>
