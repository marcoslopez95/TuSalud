<script>
import Base from '@/Pages/Users/Base.vue'
export default {
    extends: Base,
    props:{
        tipos: Object,
        user: Object
    },
    data(){
        return {
            ruta : 'users/edit/'+this.user.id,
            metodo: 'PUT',
            titulo: 'Editar Usuario'
        }
    }
}
</script>
