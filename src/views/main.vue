<template>
  <div class="main">
    <Sidebar />
    <MainContent />
  </div>
</template>

<script>
  import Sidebar from '@/components/sidebar'
  import MainContent from '@/components/MainContent'

  export default {
    name: "main",
    components: {
      Sidebar,
      MainContent
    }
  }
</script>