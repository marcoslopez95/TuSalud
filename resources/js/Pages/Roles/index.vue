<template>
    <Head title="Lista de Roles" />

    <BreezeAuthenticatedLayout>
        <template #header>
            <TituloCard 
                :titulo="'Lista de Roles'"
                :boton="'Crear Rol'"
                :ruta="'roles-create'"
            />
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                       
                       <table class="table-auto border-collapse w-full">
                           <thead class=" text-bold border-b-2 border-black ">
                               <th class='w-40'>
                                   Nombre
                               </th>
                               <th class="w-20">
                                   Descripción
                               </th>
                               <th class="w-20">
                                   Acción
                               </th>
                           </thead>
                           <tbody>
                               <tr v-for="rol in roles" :key="rol.id" class="text-center hover:bg-gray-100">
                                   <td>
                                       {{ rol.nombre }}
                                   </td>
                                   <td>
                                       {{ rol.descripcion }}
                                   </td>
                                   <td>
                                       <AccionesContenedor>
                                            <Editar 
                                                :ruta="'/roles/edit/'+rol.id"
                                            />
                                            <Eliminar />
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
import Eliminar from '@/Pages/Templates/Botones/Eliminar.vue'
import Editar from '@/Pages/Templates/Botones/Editar.vue'
import Button from '../../Components/Button.vue'
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
        roles: Object
    },
}
</script>
