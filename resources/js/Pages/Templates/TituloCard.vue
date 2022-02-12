<template>
    <div class="row-span-full flex justify-between">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ titulo }}
        </h2>
        <form :action="route(ruta)" method="get">
            <Button class="bg-blue-500 hover:bg-blue-700 font-bold active:bg-blue-900 focus:bg-blue-900">
                {{ boton }}
            </Button>
        </form>
    </div>
</template>
<style scoped>

</style>
<script>
import Button from '@/Components/Button.vue'

export default {
    name: 'TituloCard',
    components: {
        Button
    },
    props:{
        titulo: { type: String, default: 'Lista' },
        boton: { type: String, default: 'Crear' },
        ruta: { type: String, default: 'dashboard'},
    },
}
</script>
