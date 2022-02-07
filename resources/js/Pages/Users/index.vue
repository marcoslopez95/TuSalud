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
                       Estos son los usuarios
                       <table class="table table-auto border-collapse" width='100%'>
                           <thead class="table-header-group">
                               <th>
                                   Nombre
                               </th>
                               <th>
                                   Correo
                               </th>
                               <th>
                                   Rol
                               </th>
                               <th>
                                   Acción
                               </th>
                           </thead>
                           <tbody>
                               <tr v-for="user in users" :key="user.id" class="text-center">
                                   <td>
                                       {{ user.name }}
                                   </td>
                                   <td>
                                       {{ user.email }}
                                   </td>
                                   <td>
                                       {{ user.rol.nombre }}
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
import BreezeAuthenticatedLayout from '@/Layouts/Authenticated.vue'
import { Head } from '@inertiajs/inertia-vue3';
import TituloCard from '@/Pages/Templates/TituloCard.vue'

export default {
    components: {
        BreezeAuthenticatedLayout,
        Head,
        TituloCard
    },
    props:{
        users: Object
    },
}
</script>
