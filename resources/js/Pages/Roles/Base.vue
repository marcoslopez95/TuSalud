<template>
    <Head :title="titulo" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <TituloCard 
                :titulo="titulo"
                :boton="'Regresar'"
                :ruta="'roles-index'"
            />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <form @submit.prevent="submit(metodo,ruta)">
                        <BreezeValidationErrors class="mb-4" />
                           
                           <div class="grid grid-cols-3">

                                <div>
                                    <BreezeLabel for="nombre" value="Nombre" />
                                    <BreezeInput 
                                        id="nombre" 
                                        type="text" 
                                        class="mt-1 block w-full" 
                                        v-model="form.nombre"
                                        required
                                        placeholder="Nombre del Rol"
                                    />
                                </div>

                                <div>
                                    <BreezeLabel for="desc" value="Descripción" />
                                    <BreezeInput 
                                        id="desc" 
                                        type="text" 
                                        class="mt-1 block w-full ml-3" 
                                        v-model="form.descripcion" 
                                        required 
                                        placeholder="Descripcion del Rol"
                                    />
                                </div>

                                <div class="m-0 py-4 grid justify-center">
                                     <BreezeButton class="mt-2 bg-blue-500 hover:bg-blue-600 h-full" :class="{ 'opacity-25': form.processing }" :disabled="form.processing">
                                        Guardar
                                    </BreezeButton>
                                </div>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

<script>
import Button from '../../Components/Button.vue'
import Input from '../../Components/Input.vue'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import TituloCard from '@/Pages/Templates/TituloCard.vue'
import BreezeButton from '@/Components/Button.vue'
import BreezeInput from '@/Components/Input.vue'
import BreezeLabel from '@/Components/Label.vue'
import BreezeValidationErrors from '@/Components/ValidationErrors.vue'

export default {
    name: 'Base',
    components: {
        Button,
        Input,
        BreezeAuthenticatedLayout,
        BreezeButton,
        BreezeInput,
        BreezeLabel,
        BreezeValidationErrors,
        Head,
        TituloCard
    },
    data(){
        return {
            titulo: null,
            form: this.$inertia.form({
                nombre: '',
                descripcion: '',
            })
        }
    },
      methods: {
        submit(metodo,ruta) {
            console.log(this.form.nombre);
            // console.log(metodo+' '+ruta);
            if (metodo == 'post')
                this.form.post(this.route(ruta),)
            if (metodo == 'put')
                this.form.put(this.route(ruta,{"rol":this.rol_id}))
        }
    }
}
</script>
