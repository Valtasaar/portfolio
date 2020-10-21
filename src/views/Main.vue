<template>
  <div class="main">
    <Header />

    <div class="container">
      <Sidebar />
      <MainContent />
    </div>
  </div>
</template>

<script>
  import Header from '@/components/Header'
  import Sidebar from '@/components/Sidebar'
  import MainContent from '@/components/MainContent'

  export default {
    name: "main",
    components: {
      Header,
      Sidebar,
      MainContent
    }
  }
</script>