<script>
import BaseVue from './Base.vue'
export default {
    extends: BaseVue,
    props:{
        tipos: Object
    },
    data() {
        return {
            ruta : 'users-create',
            metodo: 'post',
            titulo: 'Crear Usuario'
        }
    }
}
</script>
