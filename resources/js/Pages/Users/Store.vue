<template>
    <Head title="Crear Usuario" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <TituloCard 
                :titulo="'Crear Usuario'"
                :boton="'Regresar'"
                :ruta="'users-index'"
            />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       <form :action="ruta" :method="metodo">
                           <div class="grid grid-cols-4">
                                <label for="id_rol">Rol
                                    <select name="id_rol" id="id_rol" class="ml-2">
                                        <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                                            {{ tipo.nombre }}
                                        </option>
                                    </select>
                                </label>

                                
                                    <label for="nombre">Nombre
                                        <Input type="text" :value="user.name" name='name'>
                                        </Input>
                                    </label>

                                    <label for="correo" class="ml-3">Correo
                                        <Input type="email" :value="user.email" name='email'>
                                        </Input>
                                    </label>
                                

                                <div class="m-0 p-0 grid justify-end">
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

export default {
    components: {
        Button,
        Input,
        BreezeAuthenticatedLayout,
        Head,
        TituloCard
    },
    props:{
        tipos: Object,
        user: Object
    },
    data() {
        return {
            user: {
                name: null,
                email: null
            },
            ruta : 'users/create',
            metodo : 'POST'
        }
    },
    mounted: function(){
        if(this.user.name != null){
            ruta = 'users/edit'+this.user.id
            metodo = 'PUT'
        }
    }
}
</script>
