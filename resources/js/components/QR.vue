<template>
  <div class="hello">
    <h1>Redirecting...</h1>
  </div>
</template>

<script>
export default {
    name: 'RedirectComponent',
    created(){
      window.location.replace("https://xd.adobe.com/view/adb203e9-67cc-4522-4fd6-d32966f4ecc1-db83/?fullscreen&hints=off");
    }
}
</script>
