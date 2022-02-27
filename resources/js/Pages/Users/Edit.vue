<script>
import Base from '@/Pages/Users/Base.vue'
export default {
    extends: Base,
    props:{
        tipos: Object,
        user: Object
    },
    mounted(){
        this.form.email    = this.user.email
        this.form.name     = this.user.name
        this.form.password = this.user.password
        this.form.id_rol   = this.user.id_rol
    },
    data(){
        return {
            ruta    : 'users-update',
            user_id : this.user.id,
            metodo  : 'put',
            titulo  : 'Editar Usuario'
        }
    }
}
</script>
