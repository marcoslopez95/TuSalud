<script>
import BaseVue from './Base.vue'
export default {
    extends: BaseVue,
    props:{
        tipos: Object
    },
    data() {
        return {
            user: {
                name: null,
                email: null
            },
            ruta : 'users/create',
            metodo: 'POST',
            titulo: 'Crear Usuario'
        }
    }
}
</script>
