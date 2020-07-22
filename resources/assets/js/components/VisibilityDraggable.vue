<template>
   <div class="visibility-drag">

    

       <div class="col-md-4">
             <h4 align="center">PENDIENTES</h4>

            <draggable class="list-group min-height" :list="testimonialsVisibleNew" 
        :options="{animation:200, group:'visbility'}" :element="'ul'" @add="onAdd($event, 1)">

                <li class="list-group-item" v-for="(testimonial) 
                in testimonialsVisibleNew" :key="testimonial.id" :data-id="testimonial.id">

                    <div><strong>{{ testimonial.name }}</strong></div>
                    <div>{{ testimonial.descripcion }}</div>
                    <div> Asignado a <b> {{ testimonial.responsable }} </b></div>

                    <button class="btn btn-danger" 
                    @click="eliminar(testimonial, testimonial.id)"></button>
                </li>
            </draggable>
    

    

        </div> <!-- end col-md-6 -->
        <div class="col-md-4">
            <h4 align="center"> EN CURSO </h4>

            <draggable class="list-group min-height" :list="testimonialsNotVisibleNew" 
        :options="{animation:200, group:'visbility'}" :element="'ul'" @add="onAdd($event, 2)">

                <li class="list-group-item" v-for="(testimonial, index) in 
                testimonialsNotVisibleNew" :key="testimonial.id" :data-id="testimonial.id">
                
                    <div><strong>{{ testimonial.name }}</strong></div>
                    <div>{{ testimonial.descripcion }}</div>
                    <div> Asignado a <b> {{ testimonial.responsable }} </b></div>
                    <button class="btn btn-danger" 
                    @click="eliminar(testimonial, testimonial.id)"></button>

                </li>

            </draggable>
        </div> <!-- end col-md-6 -->

        <div class="col-md-4">
            <h4 align="center">CONCLUIDOS</h4>

            <draggable class="list-group min-height" :list="doneNew" 
            :options="{animation:200, group:'visbility'}" 
            :element="'ul'" @add="onAdd($event, 3)">

                <li class="list-group-item" v-for="(testimonial, index) in doneNew"
                :key="testimonial.id" :data-id="testimonial.id">

                    <div><strong>{{ testimonial.name }}</strong></div>
                    <!-- <h3 align="center" ><b> {{ testimonial.name }} </b></h3> -->
                    <div>{{ testimonial.descripcion }}</div>
                    
                
                    <!-- 
                    <div> Asignado a <b> <input type="text" name="username" v-model="testimonial.responsable"> </b></div>

                    -->
                    <div> Asignado a <b> {{ testimonial.responsable }} </b></div>
                    <button class="btn btn-danger" 
                    @click="eliminar(testimonial, testimonial.id)"></button>
                    <button class="btn btn-warning" 
                    @click="editar(testimonial.id)"></button>

                    <!-- 
                    <td id="show-modal" @click="showModal=true; 
                    setVal(testimonial.id, testimonial.name, testimonial.descripcion )" 
        class="btn btn-info"> <span class="glyphicon glyphicon-pencil"></span>  </td>
            <a href="#" class="btn btn-danger btn-sm" v-on:click.prevent="edittar(testimonial)">Editar</a>
                -->
               </li>
               

                

    


            </draggable>
        </div> <!-- end col-md-6 -->
        
        <!-- 
        <form method="POST" v-on:submit.prevent="edittar(filTar.id)">
        <div class="modal fade" id="edit">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span> &times;</span>
                        </button>

                    </div>
                    <div class="modal-body">
                        <label for="keep"> editar </label>
                        <input type="text" name="keep" class="form-control" v-model="filTar.name">
                    <span v-for="error in errors" class="text-danger">@{{error}}</span>

                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn btn-primary" value="actualizar">
                    </div>
                </div>
            </div>
        </div>
                
                

        </form> -->

   </div>
   
   
   
</template>



<script>
    import draggable from 'vuedraggable'

    export default {
        components: {
            draggable,
            //borrar
            filTar:{'id': '', 'nombre':''},
        },

        props: ['testimonialsVisible', 'testimonialsNotVisible','done'],

        data() {
            return {
                testimonialsVisibleNew: this.testimonialsVisible,
                testimonialsNotVisibleNew: this.testimonialsNotVisible,
                doneNew: this.done
            }
        },

        methods: {
            onAdd(event, visible) {
                let id = event.item.getAttribute('data-id');
                axios.post('/pbiEstado/' + id, {
                //axios.patch('/pbiEstado/' + id, {
                                _method: 'patch' ,
                    visible: visible
                }).then((response) => {

                })
            },
            eliminar(testimonial, id){
            if(confirm("Desea eliminar esta tarea? ")){

                axios.delete('/tarea/' + id)

                .then(response => 
                    window.location.reload(),
                );
                }
            },

            
            //este 
            edittar (tarea) {
                this.filTar.id = tarea.id;
                this.filTar.id = tarea.name;
                $('#edit').modal('show');
            },
            editar(id) {
                //let id = event.item.getAttribute('data-id');
                //console.log(id)
                axios.post('/tarea/edit/' + id)
                .then((response) => {
                    console.log(id)
                })
            },
            setVal(val_id, val_name, val_age, val_profession) {
                this.e_id = val_id;
                this.e_name = val_name;
                this.e_age = val_age;
                this.e_profession = val_profession;
            },
            //editar investigar como se hace 
            editItem: function(){
                var i_val = document.getElementById('e_id');
                var n_val = document.getElementById('e_name');
                var a_val = document.getElementById('e_age');
                var p_val = document.getElementById('e_profession');
            
                axios.post('/edititems/' + i_val.value, {val_1: n_val.value, val_2: a_val.value,val_3: p_val.value })
                    .then(response => {
                    this.getVueItems();
                    this.showModal=false
                    });   
            }
        }
    }
</script>
