<script setup>
defineProps({ user: Object });
</script>

<template>
    <h1 class="text-center">Hello {{ user.name }}</h1>
</template>
