<template>
  <div class="hello">
    <span>Redirecting...</span>
  </div>
</template>

<script>
export default {
    name: 'GithubPage',
    created(){
      window.location.replace("https://osoc19.github.io/engie-hub/");
    }
}
</script>
