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
                       <form :action="route('users-create')" method="post">
                           <div>
                               <label for="id_rol">Tipo</label>
                               <select name="id_rol" id="id_rol" class="ml-2">
                                   <option v-for="tipo in tipos" :key="tipo.id" :value="tipo.id">
                                       {{ tipo.nombre }}
                                   </option>
                               </select>

                               <label for=""></label>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </BreezeAuthenticatedLayout>
</template>

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
        tipos: Object,
    },
}
</script>
