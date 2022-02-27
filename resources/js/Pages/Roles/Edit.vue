<script>
import Base from '@/Pages/Roles/Base.vue'
export default {
    extends: Base,
    props:{
        rol: Object
    },
    mounted(){
        this.form.nombre = this.rol.nombre
        this.form.descripcion = this.rol.descripcion
    },
    data(){
        return {
            ruta        : 'roles-update',
            rol_id         :  this.rol.id,
            metodo      : 'put',
            titulo      : 'Editar Rol',
            titulo_card : null,
        }
    }
    
}
</script>
