<template>
  <MainLayout>
    <Head title="Usuario Insertar" />
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
              Crear Usuario
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
                <div  class="inline-block">
                  <button
                    type="button"
                    class="
                      border border-indigo-500
                      text-indigo-500 text-xl
                      rounded-md
                      px-4
                      py-2
                      m-2
                      duration-500
                      ease
                      select-none
                      transform
                      hover:scale-110
                      focus:outline-none focus:shadow-outline
                    "
                  >
                    <Link href="/importar/"> Importar</Link>
                  </button>
                </div>

                <form id="formGuardar" @submit.prevent="GuardarUsuario">
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <div class="relative">
                      <JetLabel for="Nombres" value="Nombres:" />
                      <JetInput
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.nombres"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.nombres.$error,
                        }"
                        placeholder="ingresar nombres"
                      />
                      <div
                        v-if="errors.nombres"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene una cuenta registrada.
                      </div>
                      <div
                        v-if="errors.nombres"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.nombres }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.nombres.$errors"
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
                      <JetLabel for="ApellidoPaterno" value="ApellidoPaterno:" />
                      <JetInput
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.apellidopaterno"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.apellidopaterno.$error,
                        }"
                        placeholder="ingresar apellidos"
                      />
                      <div
                        v-if="errors.apellidopaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene estos apellidos registrado.
                      </div>
                      <div
                        v-if="errors.apellidopaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.apellidopaterno }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.apellidopaterno.$errors"
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

                  <!-- Nombre Usuario -- Cargo -->
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <!-- 
                    <div class="relative">
                      <JetLabel for="Nombre" value="Usuarios:" />
                      <JetInput
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.name"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.name.$error,
                        }"
                        placeholder="ingresar nombre usuario"
                      />
                      <div
                        v-if="errors.name"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene una cuenta registrada.
                      </div>
                      <div
                        v-if="errors.name"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.name }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.name.$errors"
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
                    </div>-->

                    <div class="relative">
                      <JetLabel for="ApellidoMaterno" value="ApellidoMaterno:" />
                      <JetInput
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.apellidomaterno"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.apellidomaterno.$error,
                        }"
                        placeholder="ingresar apellido materno"
                      />
                      <div
                        v-if="errors.apellidomaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene estos apellidos registrado.
                      </div>
                      <div
                        v-if="errors.apellidomaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.apellidomaterno }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.apellidomaterno.$errors"
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

                    <div>
                      <JetLabel for="Cargo" value="Tipo de Cargo:" />

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
                        v-model="form.Cargo"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.Cargo.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccionar Cargo
                        </option>
                        <option
                          v-for="(c, index) in cargo"
                          :key="index"
                          :value="c.valor"
                        >
                          {{ c.campo }}
                        </option>
                      </select>
                      <div
                        v-if="errors.Cargo"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.Cargo }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.Cargo.$errors"
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
                  <!-- Institucion Educativa -- Telefono -->
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <!-- Institucion Educativa -->
                    <div>
                      <JetLabel for="Institucion" value="Institucion:" />
                      <JetInput
                        @keyup="nombreinstitucion"
                        
                        class="mt-1 block w-full"
                        autofocus
                        type="text"
                        v-model="form.institucion"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.institucion.$error,
                        }"
                        placeholder="Escribir nombre de la institucion"
                      />
                      <div
                        v-if="errors.institucion"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.institucion }}
                      </div>
                      <div
                        v-if="errors.institucionid"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este colegio ya ha sido registrado
                      </div>
                      <div
                        v-for="(error, index) of v$.form.institucion.$errors"
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

                      <div >
                        <ul
                        v-if="form.institucion"
                        class="
                      
                          absolute
                          align-self: center
                          z-10
                          mb-4
                          w-80
                          
                          flex flex-col
                          rounded-b-lg
                          border border-t-0 border-b-0 border-gray-200
                          shadow-lg
                          bg-white
                        "
                      >
                        <li v-for="n in DatosUsuario" :key="n.id">
                          <button
                            class="
                              p-1
                              text-sm
                              font-medium
                              border-b border-gray-200
                              cursor-pointer
                              hover:bg-orange-50
                              block
                              w-full
                            "
                            @click="llenarnombre(n.id, n.nombre)"
                          >
                            <div>
                              <div>
                                {{ n.nombre }} 
                              </div>
                            </div>
                          </button>
                        </li>
                        
                      </ul>
                      </div>

                      <div
                          v-if="!userexists"
                          class="p-4 w-full rounded-b-lg shadow my-0 text-sm"
                        >
                          No se encontraron resultados para:
                          <strong>{{ form.name }}.</strong>
                        </div>

                    </div>

                    <div class="relative">
                      <JetLabel for="Telefono" value="Telefono:" />
                      <JetInput
                        @keypress="SoloNumeros($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.telefono"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.telefono.$error,
                        }"
                        placeholder="ingresar telefono"
                      />
                      <div
                        v-if="errors.telefono"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.telefono }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.telefono.$errors"
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

                  <!-- Email -- Tipo rol -->
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <div>
                      <JetLabel for="email" value="Email:" />

                      <JetInput
                        class="mt-1 block w-full"
                        type="email"
                        v-model="form.email"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.email.$error,
                        }"
                        placeholder="Escribir Email"
                      />
                      <div
                        v-if="errors.email"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.email }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.email.$errors"
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

                    <div>
                      <JetLabel for="TipoRol" value="Tipo de Rol:" />

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
                        v-model="form.rolId"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.rolId.$error,
                        }"
                      >
                        <option disabled selected value="">
                          Seleccione Rol
                        </option>
                        <option
                          v-for="(rol, index) in roles"
                          :key="index"
                          :value="rol.id"
                        >
                          {{ rol.name }}
                        </option>
                      </select>
                      <div
                        v-if="errors.rolId"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.rolId }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.rolId.$errors"
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
                  <!-- Password -- Confirmar contraseña -->
                  <div class="grid grid-cols-1 md:grid-cols-2 md:gap-8">
                    <div>
                      <JetLabel for="password" value="Contraseña:" />
                      <JetInput
                        class="mt-1 block w-full"
                        type="password"
                        v-model="form.password"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.password.$error,
                        }"
                        placeholder="Escribir contraseña"
                      />

                      <div
                        v-if="errors.password"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.password }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.password.$errors"
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
                    <div>
                      <JetLabel
                        for="ConfirmarPassword"
                        value="Confirmar Contraseña:"
                      />
                      <JetInput
                        class="mt-1 block w-full"
                        type="password"
                        v-model="form.password_confirmation"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.password_confirmation.$error,
                        }"
                        placeholder="Repite la contraseña"
                      />
                      <div
                        v-if="errors.password_confirmation"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors.password_confirmation }}
                      </div>
                      <div
                        v-for="(error, index) of v$.form.password_confirmation
                          .$errors"
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
      </div>
      {{DatosUsuario}}
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
    cargo: Object,
    institucion: Object,
  },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      VerInputUgel: false,
      DatosUsuario: [],
      userexists: true,

      form: this.$inertia.form({
        _method: "POST",
        nombres:"",
        apellidopaterno:"",
        apellidomaterno:"",
        telefono:"",
        name: "",
        email: "",
        password: "",
        password_confirmation: "",
        rolId: "",
        Cargo: "",
        institucion: "",
        institucionid: "",
      }),
    };
  },

  validations() {
    return {
      form: {
        nombres: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),

          $autoDirty: true,
        },
        apellidopaterno: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),

          $autoDirty: true,
        },
        apellidomaterno: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),

          $autoDirty: true,
        },
        telefono: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),

          $autoDirty: true,
        },
        
        email: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          email: helpers.withMessage(
            "El valor no es una dirección de correo electrónico válida",
            email
          ),
          $autoDirty: true,
        },
        password: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío.",
            required
          ),
          minLength: helpers.withMessage(
            "La contraseña debe tener al menos 8 letras.",
            minLength(8)
          ),
          maxLength: helpers.withMessage(
            "La contraseña debe tener una longitud máxima permitida es 50 letras.",
            maxLength(50)
          ),

          $autoDirty: true,
        },
        password_confirmation: {
          sameAsPassword: helpers.withMessage(
            "Las contraseñas deben ser idénticas.",
            sameAs(this.form.password)
          ),

          $autoDirty: true,
        },
        rolId: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        Cargo: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
        institucion: {
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
    MostrarUgel(event){
      if(this.form.Cargo == "3"){
        this.VerInputUgel = true;

      }else{
        this.VerInputUgel = false;
      }
    },
    
    llenarnombre(id, nombre) {
      console.log(id + "-" + nombre);
      this.form.institucion = nombre;
      this.form.institucionid = id;
      this.DatosUsuario = [];
      

    },
    
    async nombreinstitucion() {
      
      if (this.form.institucion != "") {
        await axios

          .get("/buscarinst/" + this.form.institucion)
          .then((response) => {
            if (response.data.length > 0) {
            this.userexists = true
            this.DatosUsuario = response.data;  
            }else{
            this.DatosUsuario =[]
            this.userexists = false  
            }
            
            //

             console.log(response.data);
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        this.DatosUsuario = [];
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
        this.route("usuarios.store"),

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
