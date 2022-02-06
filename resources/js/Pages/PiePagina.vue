<template>
    <div class="hidden fixed bottom-0 right-0 px-6 py-4 sm:block text-white">
        Marcos M. López   -   {{now}}
    </div>
</template>

<style scoped>
   
</style>

<script>
export default {
    name: 'PiePagina',
    components: {
    },
    props: {
        now: Date
    },
}
</script>
