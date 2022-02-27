<template>
<form @submit.prevent="submit()">
    <Button class="stroke-white bg-red-500 px-1 py-1 hover:bg-red-600" title="Eliminar">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 " fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
        </svg>
    </Button>
</form>
</template>

<script>
import Button from '../../../Components/Button'
export default {
  components: { Button },
    name:'Eliminar',
    props: {
        ruta: { type: String, required: true },
        id: { type: Number, required: true },
    },
    data() {
        return{
            form: this.$inertia.form()
        }
    },
      methods: {
        submit() {
            console.log(`ruta:${this.ruta} _ id:${this.id}`);
            // console.log(metodo+' '+ruta);
                this.form.delete(this.route(this.ruta,{"rol":this.id}))
        }
    }
}
</script>