<template>
  <MainLayout>
    <Head title="Aprobados Insertar" />
    <div class="py-2 overflow-y-auto h-full">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="overflow-hidden px-2">
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-blue-900
                dark:text-gray-200
              "
            >
              Registrar Nivel de Logro
            </h2>
          </div>
          <div>
            <div class="flex flex-col flex-wrap sm:flex-row">
              <div
                class="
                  shadow-lg
                  rounded-2xl
                  p-4
                  bg-white
                  dark:bg-gray-700
                  w-full
                "
              >
                

                <form id="formGuardar" @submit.prevent="GuardarUsuario">
                  
                  <!-- Tipo Modalidad -- Tipo Modulo -->
                  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
  
                    <!-- Tipo de Modalidad -->
                    <div>
                      <JetLabel
                        for="Modalidad"
                        value="Modalidad:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.modalidad"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.modalidad.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Modalidad de Estudio
                        </option>
                        <option
                          v-for="(m, index) in tipomodalidad"
                          :key="index"
                          :value="m.valor"
                        >
                          {{ m.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.modalidad"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este modalidad ya ha sido registrada
                      </div>
                      <div
                        v-for="(error, index) of v$.form.modalidad.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                    <!-- Tipo Modulo -->
                    <div>
                      <JetLabel
                        for="Modulo"
                        value="Modulo:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.modulo"
                        @change="MostrarBimestre(this.value)"
                        
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.modulo.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Modulo
                        </option>
                        <option
                          v-for="(m, index) in modulo"
                          :key="index"
                          :value="m.valor"
                        >
                          {{ m.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.modulo"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este modulo ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.modulo.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                    <!-- Tipo de Estudio -->
                    <div>
                      <JetLabel
                        for="TipoEstudio"
                        value="Tipo de Estudio:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.tipoestudio"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.tipoestudio.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Tipo de Estudio
                        </option>
                        <option
                          v-for="(te, index) in tipoestudio"
                          :key="index"
                          :value="te.valor"
                        >
                          {{ te.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.tipoestudio"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este tipo de estudio ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.tipoestudio.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                   
                  </div>

                  <!-- Tipo de Estudio -- Nivel -- Grado -->
                  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
                    
                    <!-- Nivel -->
                    <div>
                      <JetLabel
                        for="Nivel"
                        value="Nivel:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.nivel"
                        @change="MostrarEspecialidad(this.value)"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.nivel.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Nivel de Estudio
                        </option>
                        <option
                          v-for="(n, index) in nivel"
                          :key="index"
                          :value="n.valor"
                        >
                          {{ n.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.nivel"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este nivel ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.nivel.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                    <!-- Grado -->
                    <div>
                      <JetLabel
                        for="Grado"
                        value="Grado:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.grado"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.grado.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Grado
                        </option>
                        <option
                          v-for="(g, index) in grado"
                          :key="index"
                          :value="g.valor"
                        >
                          {{ g.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.grado"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este grado ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.grado.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="grid grid-cols-1 md:grid-cols-3 md:gap-8">
                    <div v-show="VerInputBimestre">
                      <JetLabel
                        for="Bimestre"
                        value="Bimestre:"
                      />

                      <select
                        class="
                          border-gray-300
                          focus:border-indigo-300
                          focus:ring
                          focus:ring-indigo-200
                          focus:ring-opacity-50
                          rounded-md
                          shadow-sm
                          w-full
                          mt-1
                          py-2.5
                          px-4
                          text-gray-700
                          leading-tight
                          focus:border-indigo-300
                          rounded-lg
                          dark:border-gray-200
                          dark:border-none
                          dark:bg-gray-600
                          dark:text-white
                          dark:focus:border-blue-500
                          dark:focus:shadow-outline-blue
                        "
                        v-model="form.bimestre"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.bimestre.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Bimestre
                        </option>
                        <option
                          v-for="(b, index) in bimestre"
                          :key="index"
                          :value="b.valor"
                        >
                          {{ b.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.bimestre"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este bimestre ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.bimestre.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                    
                    <div class="relative">
                      <JetLabel for="Cantidad" value="Cantidad:" />
                      <JetInput
                        @keypress="SoloNumeros($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.cantidad"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.cantidad.$error,
                        }"
                        placeholder="Ingresar cantidad"
                      />
                      
                      <div
                        v-if="errors.cantidad"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.cantidad }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.cantidad.$errors"
                        :key="index"
                      >
                        <div
                          class="
                            text-xs
                            px-2
                            py-2
                            text-red-400
                            dark:text-red-400
                          "
                        >
                          {{ error.$message }}
                        </div>
                      </div>
                    </div>
                  </div>
                  
                  
                 
                </form>

                <JetButton
                  form="formGuardar"
                  class="my-3"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing || v$.form.$invalid"
                >
                  Guardar
                  {{ form.progress ? `${form.progress.percentage}% ` : "" }}
                </JetButton>
              </div>
            </div>
          </div>
        </div>
        {{modulo}}
      </div>
    </div>
  </MainLayout>
</template>

<script>
import { defineComponent } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Componentes/Button.vue";
import JetLabel from "@/Componentes/Label.vue";
import JetInput from "@/Componentes/Input.vue";
import useVuelidate from "@vuelidate/core";
import {
  required,
  email,
  minLength,
  maxLength,
  sameAs,
  helpers,
} from "@vuelidate/validators";
import DialogModalVue from "../../Jetstream/DialogModal.vue";

export default defineComponent({
  components: {
    Head,
    MainLayout,
    Link,
    JetButton,
    JetInput,
    JetLabel,
  },
  props: {
    roles: Array,
    errors: Object,
  
    instituciones: Object,
    tipomodalidad: Object,
    modulo: Object,
    tipoestudio: Object,
    nivel: Object,
    grado: Object,
    especialidad: Object,
    bimestre: Object,
  },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      VerInputEspecialidad: false,
      VerInputBimestre: false,
    

      form: this.$inertia.form({
        _method: "POST",
       
        modalidad: "",
        modulo: "",
        tipoestudio: "",
        nivel: "",
        grado: "",
      
        bimestre: "",
        cantidad: "",
        idusuario: this.$page.props.user.id,
        usuariocreador: this.$page.props.user.name,
      }),
    };
  },

  validations() {
    return {
      form: {
        
        
        
        modalidad: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        modulo: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        tipoestudio: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        nivel: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        grado: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        bimestre: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        cantidad: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
      },
    };
  },
  methods: {
    /*
    llenarnombre(id, nombre) {
      console.log(id + "-" + nombre);
      this.form.name = nombre;
      this.form.trabajadorid = id;
      this.DatosTrabajador = [];
      

    },*/
    /*
    async nombreusuario() {
      
      if (this.form.name != "") {
        await axios

          .get("/buscarnom/" + this.form.name)
          .then((response) => {
            if (response.data.length > 0) {
            this.userexists = true
            this.DatosTrabajador = response.data;  
            }else{
            this.DatosTrabajador =[]
            this.userexists = false  
            }
            
            //

             console.log(response.data);
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        this.DatosTrabajador = [];
      }
    },*/
    MostrarEspecialidad(event){
      if(this.form.modulo == "6" && this.form.nivel == "3"){
        this.VerInputEspecialidad = true;

      }else{
        this.VerInputEspecialidad = false;
      }
    },
    MostrarBimestre(event){
      if(this.form.modulo == "3"){
        this.VerInputBimestre = true;

      }else{
        this.VerInputBimestre = false;
      }
    },
    SoloNumeros($event) {
      if (
        $event.charCode === 0 ||
        /\d/.test(String.fromCharCode($event.charCode))
      ) {
        return true;
      } else {
        $event.preventDefault();
      }
    },
    sololetras($event) {
      var letras = /^[a-zA-ZñÑ\s]*$/;

      if (letras.test(String.fromCharCode($event.charCode))) {
        return true;
      } else {
        $event.preventDefault();
      }
    },

    GuardarUsuario() {
      this.form.post(
        this.route("aprobados.store"),

        {
          onSuccess: () => {
            this.form.reset();
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Usuario registrado correctamente",
              },
              2000
            );
          },
          onError: (errors) => {
            this.$notify(
              {
                group: "mensajes",
                type: "error",
                title: "Error",
                text: "Usuario no registrado",
              },
              2000
            );
          },
        }
      );
    },
    ImportExcel() {
      let paramString = new URLSearchParams();

      window.open(`/import?${paramString.toString()}`);
    },
  },
});
</script>
