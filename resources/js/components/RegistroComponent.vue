<template>
    <div class="container-fluid">
        <form id="form" method="POST" action @submit.prevent="crear('form')">
            <div class="row">
                <div class="form-group col-md-12">
                    <label 
                        class="col-md-12" 
                        :class="{'error' : errors.has('nombre')}">
                        Nombre(s)
                    </label>
                    <input 
                        v-model="nombre" 
                        id="nombre" 
                        type="text" 
                        class="form-control" 
                        name="nombre" 
                        placeholder="Nombre" 
                        v-validate="{ required:true, regex:/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label 
                        :class="{'error' : errors.has('apellido_paterno')}"
                        class="col-md-12">
                        Apellido Paterno
                    </label>
                    <input 
                        v-model="apellido_paterno" 
                        id="apellido_paterno" 
                        type="text" 
                        class="form-control" 
                        name="apellido_paterno" 
                        v-validate="{ required:true, regex:/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/}"  placeholder="Apellido Paterno">
                </div>
                <div class="form-group col-md-6">
                    <label 
                        :class="{'error' : errors.has('apellido_materno')}"
                        class="col-md-12">
                        Apellido Materno
                    </label>
                    <input 
                        v-model="apellido_materno" 
                        id="apellido_materno" 
                        type="text" 
                        class="form-control" 
                        name="apellido_materno" 
                        value="" 
                        v-validate="{ required:true, regex:/^[a-zA-Z]+(\s*[a-zA-Z]*)*[a-zA-Z]+$/}"  placeholder="Apellido Materno">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label 
                        :class="{'error' : errors.has('genero')}"
                        class="col-md-12">
                        Genero
                    </label>
                    <select 
                        @change="generoseleccionar($event)" 
                        v-model="genero" 
                        id="genero" 
                        type="text" 
                        class="form-control" 
                        name="genero" 
                        v-validate="'required'" >
                        <option value="">Selecciona una opción</option>
                        <option v-for="genero in generos" :key="genero.id" :value="genero.id">{{genero.nombre}}</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label
                        :class="{'error' : errors.has('edad')}"
                        class="col-md-12 ">
                        Edad
                    </label>
                    <input 
                       type="number" 
                        min="1" 
                        max="99" 
                        v-model="edad" 
                        id="edad" 
                        class="form-control" 
                        name="edad" 
                        v-validate="{required:true, numeric:true}"  
                        placeholder="Edad">
                </div>
                <div class="form-group col-md-4">
                    <label 
                        :class="{'error' : errors.has('estado_civil')}"
                        class="col-md-12">
                        Estado Civil
                    </label>
                    <select 
                        @change="estado_civil($event)" 
                        id="estado_civil" 
                        type="text" 
                        class="form-control" 
                        name="estado_civil" 
                        v-validate="'required'" >
                        <option value="">Selecciona una opción</option>
                        <option v-for="estado_civil in estadosCiviles" :key="estado_civil.id" :value="estado_civil.id">{{estado_civil.nombre}}</option>
                    </select>   
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label 
                        :class="{'error' : errors.has('email')}"
                        class="col-md-12">
                        E-mail
                    </label>
                    <input 
                        v-model="email" 
                        id="email" 
                        type="email" 
                        class="form-control"  
                        name="email" 
                        v-validate="{ required:true, email:true, min:8, max:50}"  
                        placeholder="E-mail">
                </div>
                <div class="form-group col-md-6">
                    <label 
                        :class="{'error' : errors.has('contraseña')}"
                        class="col-md-12">
                        Contraseña
                    </label>
                    <input 
                        v-model="contraseña" 
                        id="contraseña" 
                        type="password" 
                        class="form-control"  
                        name="contraseña" 
                        v-validate="'required'"  
                        placeholder="Contraseña">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label 
                        :class="{'error' : errors.has('nivel')}"
                        class="col-md-12">Nivel Interes
                    </label>
                    <select 
                        @change="nivelseleccionar($event)" 
                        id="nivel" 
                        type="text" 
                        class="form-control"  
                        name="nivel" 
                        v-validate="'required'" >
                        <option value="">Selecciona una opción</option>
                        <option v-for="nivel in niveles" :key="nivel.id" :value="nivel.id">{{nivel.nombre}}</option>
                    </select>  
                </div>
                <div class="form-group col-md-12" v-if="nivel != 1 && nivel != ''">
                    <label 
                        :class="{'error' : errors.has('licenciatura')}"
                        class="col-md-12">
                        Oferta academica
                    </label>
                    <select 
                        @change="licenciatura($event)" 
                        id="licenciatura" 
                        type="text" 
                        class="form-control" 
                        name="licenciatura"  
                        v-validate="'required'" >
                        <option value="">Selecciona una opción</option>
                        <option v-for="licenciatura in licenciaturas" :key="licenciatura.id" :value="licenciatura.id">{{licenciatura.nombre}}</option>
                    </select>
                </div>
            </div>
            <div class="form-row justify-content-center">
                <div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </div>
            </div>
            <br>
        </form>
    </div>
</template>

<script>
    const Swal = require('sweetalert2');
    export default {
        name:"RegistroComponent",
        data() {
            return {
                nombre:"",
                apellido_paterno:"",
                apellido_materno:"",
                edad:"",
                contraseña:"",
                email:"",            
                nivel:"",
                licenciatura:"",    
                genero:"",
                estadoCivil:"",
                generos: [],
                estadosCiviles: [],
                niveles: [],
                licenciaturas: []
            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        created(){
            this.getDatos();
        },
        methods:{
            getDatos(){
                axios.get("/api/registro/datos")
                .then(response => {
                    this.generos = response.data.generos;
                    this.estadosCiviles = response.data.estados_civiles;
                    this.niveles = response.data.niveles_interes;
                    
                }).catch(error => {
                    Swal.fire({
                      title: 'Surgio un problema!',
                      text: 'Comunicate a soporte',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    })
                })
            },
            getOfertasAcademicas(event){
                axios.get('/api/registro/licenciaturas', {
                    params: {
                      nivel: this.nivel
                    }
                }).then(response => {
                    this.licenciaturas = response.data.licenciaturas;
                }).catch(error => {
                    Swal.fire({
                      title: 'Surgio un problema!',
                      text: 'Comunicate a soporte',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    })
                })
            },
            
            generoseleccionar(event){
                this.genero = event.target.value;
            },
            estado_civil(event){
                this.estadoCivil = event.target.value;
            },
            nivelseleccionar(event){
                this.nivel = event.target.value;
                this.getOfertasAcademicas();
            },
            licenciatura(event){
                this.licenciatura = event.target.value;
            }, 
            getOfertasAcademicas(event){
                axios.get('/api/registro/licenciaturas', {
                    params: {
                      nivel: this.nivel
                    }
                }).then(response => {
                    this.licenciaturas = response.data.licenciaturas;
                }).catch(error => {
                    Swal.fire({
                      title: 'Surgio un problema!',
                      text: 'Comunicate a soporte',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    })
                })
            },
            crear(){
                this.$validator.validateAll().then(valid => {
                    if(valid){

                        axios.post(`/usuario`,{
                            nombre:this.nombre,
                            apellido_paterno:this.apellido_paterno,
                            apellido_materno:this.apellido_materno,
                            edad:this.edad,
                            estado_civil:this.estadoCivil,
                            email:this.email,
                            password:this.contraseña,
                            nivel:this.nivel,
                            licenciatura:this.licenciatura,
                            genero:this.genero
                        })
                        .then(response => {
                            var estatus=response.data.estatus;
                            if (estatus) {
                                location.reload();
                            }else{
                                Swal.fire({
                                  title: 'Surgio un problema!',
                                  text: response.data.mensaje,
                                  icon: 'error',
                                  confirmButtonText: 'OK'
                                })
                            }
                            
                        }).catch(error => {
                            console.log(error);
                            Swal.fire({
                              title: 'Surgio un problema!',
                              text: 'Comunicate a soporte',
                              icon: 'error',
                              confirmButtonText: 'OK'
                            })
                        })
                    }else{
                       console.log(this.errors.has('nombre'))
                        Swal.fire({
                            title: 'Surgio un problema!',
                            text: this.errors.all(),
                            icon: 'error',
                            confirmButtonText: 'OK'
                        })
                    }
                })
                
            },
        }
    }
</script>
<style type="text/css">
    .error{
        color: red;
    }
</style>