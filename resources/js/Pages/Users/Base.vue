<template>
    <Head :title="titulo" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <TituloCard 
                :titulo="titulo"
                :boton="'Regresar'"
                :ruta="'users-index'"
            />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form @submit.prevent="submit(metodo,ruta)">
                            <BreezeValidationErrors class="mb-4" />
                            <div class="grid grid-cols-4">
                                

                                <div>
                                    <BreezeLabel for="name" value="Nombre" />
                                    <BreezeInput 
                                        id="name" 
                                        type="text" 
                                        class="mt-1 block w-full" 
                                        v-model="form.name"
                                        required
                                        placeholder="Nombre del Usuario"
                                    />
                                </div>

                                <div class="ml-3">
                                    <BreezeLabel for="email" value="Email" />
                                    <BreezeInput 
                                        id="email" 
                                        type="text" 
                                        class="mt-1 block w-full" 
                                        v-model="form.email"
                                        required
                                        placeholder="Email del Usuario"
                                    />
                                </div>

                                <div class="ml-3">
                                    <BreezeLabel for="password" value="Contraseña" />
                                    <BreezeInput 
                                        id="password" 
                                        type="password" 
                                        class="mt-1 block w-full" 
                                        v-model="form.password"
                                        required
                                    />
                                </div>

                                <div class="ml-3">
                                    <BreezeLabel for="password_confirmation" value="Confirmar Contraseña" />
                                    <BreezeInput 
                                        id="password_confirmation" 
                                        type="password" 
                                        class="mt-1 block w-full" 
                                        v-model="form.password_confirmation"
                                        required
                                    />
                                </div>

                                <div class="mt-3">
                                    <label for="id_rol" class="mr-2">Rol</label>
                                    <select name="id_rol" id="id_rol" v-model="form.id_rol" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm ">
                                        <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                                            {{ tipo.nombre }}
                                        </option>
                                    </select>
                                </div>

                                <div class="m-0 py-4 grid justify-end">
                                    <Button class="bg-blue-500 hover:bg-blue-600 h-full ">
                                        Guardar
                                    </Button>
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
    props:{
        tipos: Object,
    },
    data(){
        return {
            titulo  : null,
            form    : this.$inertia.form({
                email                   : '',
                name                    : '',
                password                : '',
                password_confirmation   : '',
                id_rol                  : '',
            })
            
        }
    },
      methods: {
        submit(metodo,ruta) {
            console.log(this.form)
            // console.log(metodo+' '+ruta);
            if (metodo == 'post')
                this.form.post(this.route(ruta),)
            if (metodo == 'put')
                this.form.put(this.route(ruta,{"user":this.user_id}))
        }
    }
}
</script>
