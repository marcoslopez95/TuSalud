<template>
<form :action="ruta" method="get" class="p-0 m-0">
    <Button class="stroke-white hover:bg-blue-600 bg-blue-500 px-1 py-1" title='Editar'>
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
        </svg>
    </Button>
</form>
</template>

<script>
import Button from '../../../Components/Button'
export default {
    components: { Button },
    name:'Editar',
    props:{
        ruta: { type: String, default: 'dashboard'},
        
    }
}
</script>