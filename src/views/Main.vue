<template>
  <div class="main">
    <Header />

    <div class="container">
      <MainContent />
    </div>
  </div>
</template>

<script>
  import Header from '@/components/Header'
  import MainContent from '@/components/MainContent'

  export default {
    name: "main",
    components: {
      Header,
      MainContent
    }
  }
</script>