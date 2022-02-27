<template>
    <Head title="Lista de Usuarios" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <TituloCard 
                :titulo="'Lista de Usuarios'"
                :boton="'Crear Usuario'"
                :ruta="'users-create'"
            />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       
                       <table class="table-auto border-collapse w-full">
                           <thead class=" text-bold border-b-2 border-black ">
                               <th class="w-10">
                                   ID
                               </th>
                               <th class='w-40'>
                                   Nombre
                               </th>
                               <th class="w-20">
                                   Correo
                               </th>
                               <th class="w-20">
                                   Rol
                               </th>
                               <th class="w-20">
                                   Acción
                               </th>
                           </thead>
                           <tbody>
                               <tr v-for="user in users" :key="user.id" class="text-center hover:bg-gray-100">
                                   <td>
                                       {{user.id }}
                                   </td>
                                   <td>
                                       {{ user.name }}
                                   </td>
                                   <td>
                                       {{ user.email }}
                                   </td>
                                   <td>
                                       {{ user.rol.nombre }}
                                   </td>
                                   <td>
                                       <AccionesContenedor>
                                            <Editar 
                                                :ruta="'/users/edit/'+user.id"
                                            />
                                            <Eliminar 
                                                :ruta="'users-destroy'"
                                                :id="user.id"
                                                :nombre="{'user':user.id}"
                                            />
                                       </AccionesContenedor>
                                   </td>
                               </tr>
                           </tbody>
                       </table>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>
<style scoped>

</style>
<script>
import Eliminar from '@/Pages/Templates/Botones/Eliminar'
import Editar from '@/Pages/Templates/Botones/Editar'
import Button from '../../Components/Button'
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import TituloCard from '@/Pages/Templates/TituloCard.vue'
import AccionesContenedor from '@/Pages/Templates/AccionesContenedor.vue'

export default {
    components: {
        Eliminar,
        Editar,
        Button,
        BreezeAuthenticatedLayout,
        Head,
        TituloCard,
        AccionesContenedor
    },
    props:{
        users: Object
    },
}
</script>
