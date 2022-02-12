<template>
    <div class="row-span-full flex justify-evenly">
        <slot />
    </div>
</template>
<style scoped>

</style>
<script>
import Button from '@/Components/Button.vue'

export default {
    name: 'AccionesContenedor',
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
