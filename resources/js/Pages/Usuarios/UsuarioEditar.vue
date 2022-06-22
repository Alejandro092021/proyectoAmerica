
<template>
  <MainLayout>
    <Head title="Usuario Editar" />
    <div class="py-2">
      <div class="max-w-7xl mx-auto xs:px-2 sm:px-2 lg:px-2 mb-2">
        <div class="overflow-hidden px-2">
          <div class="flex justify-between">
            <h2
              class="
                my-3
                text-2xl
                font-semibold
                text-gray-600
                dark:text-gray-200
              "
            >
              Perfil
            </h2>
          </div>

          <div class="flex flex-col flex-wrap sm:flex-row">
            <!-- Perfil -->
            <div class="w-full xs:w-full sm:w-full md:w-1/2 xl:w-1/2">
              <div class="mb-4 sm:mr-2 xl:mr-2">
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
                  <form id="formEditar" @submit.prevent="EditarPerfil">
                    <div>
                      <input
                        type="file"
                        accept="image/*"
                        class="hidden"
                        ref="photo"
                        @change="actualizaFotoPrevia"
                      />
                      <JetLabel for="foto" value="Foto" />

                      <div v-show="!fotoPrevia" class="mt-2">
                        <img
                          v-if="!usuarios.profile_photo_path"
                          :src="usuarios.profile_photo_url"
                          :alt="usuarios.name"
                          class="rounded-full h-20 w-20 object-cover"
                        />
                        <img
                          v-else
                          :src="`/storage/${usuarios.profile_photo_path}`"
                          :alt="usuarios.name"

                          class="rounded-full h-20 w-20 object-cover"
                        />
                      </div>
                      <!-- Foto de perfil actual -->
                      <div class="mt-2" v-show="fotoPrevia">
                        <span
                          class="block rounded-full w-20 h-20"
                          :style="
                            'background-size: cover; background-repeat: no-repeat; background-position: center center; background-image: url(\'' +
                            fotoPrevia +
                            '\');'
                          "
                        >
                        </span>
                      </div>
                      <div>
                        <JetButtonLight
                          class="mt-2"
                          @click.prevent="seleccionarNuevaFoto"
                        >
                          Subir foto
                          <svg
                            class="w-5 h-5 ml-2"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg"
                          >
                            <path
                              strokeLinecap="round"
                              strokeLinejoin="round"
                              strokeWidth="{2}"
                              d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z"
                            />
                            <path
                              strokeLinecap="round"
                              strokeLinejoin="round"
                              strokeWidth="{2}"
                              d="M15 13a3 3 0 11-6 0 3 3 0 016 0z"
                            />
                          </svg>
                        </JetButtonLight>
                        <JetSecondaryButtonLight
                          class="ml-5"
                          @click.prevent="eliminarFoto()"
                          v-if="form.photo"
                        >
                          Eliminar foto
                          <svg
                            class="w-5 h-5 ml-2"
                            aria-hidden="true"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                          >
                            <path
                              fill-rule="evenodd"
                              d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"
                              clip-rule="evenodd"
                            ></path>
                          </svg>
                        </JetSecondaryButtonLight>
                      </div>
                    </div>
                    <div class="relative">
                      <JetLabel>Nombres</JetLabel>
                      <JetInput
                      
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.nombres"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.nombres.$error,
                        }"
                        placeholder="buscar por apellido paterno o por razon social"
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
                      <JetLabel>Apellido Paterno</JetLabel>
                      <JetInput
                      
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.apellidopaterno"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.apellidopaterno.$error,
                        }"
                        placeholder="Ingresar apellido paterno"
                      />
                      <div
                        v-if="errors.apellidopaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene una cuenta registrada.
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

                    <div class="relative">
                      <JetLabel>Apellido Materno</JetLabel>
                      <JetInput
                      
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.apellidomaterno"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.apellidomaterno.$error,
                        }"
                        placeholder="Ingresar apellido paterno"
                      />
                      <div
                        v-if="errors.apellidomaterno"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene una cuenta registrada.
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

                    <div class="relative">
                      <JetLabel>Telefono</JetLabel>
                      <JetInput
                      
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.telefono"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.telefono.$error,
                        }"
                        placeholder="Ingresar apellido paterno"
                      />
                      <div
                        v-if="errors.telefono"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        Este usuario ya tiene una cuenta registrada.
                      </div>
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

                    


                    <div class="relative">
                      <JetLabel>Usuarios</JetLabel>
                      <JetInput
                      
                        @keypress="sololetras($event)"
                        class="mt-1 block w-full"
                        type="text"
                        v-model="form.name"
                        disabled
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.name.$error,
                        }"
                        placeholder="buscar por apellido paterno o por razon social"
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
                      
                    </div>
                    <div>
                      <JetLabel class="laradash-JetLabel">Correo</JetLabel>
                      <JetInput
                        class="mt-1 block w-full"
                        type="email"
                        v-model="form.email"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.form.email.$error,
                        }"
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
                      <JetLabel>Típo de Rol</JetLabel>

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
                  </form>

                  <JetButton
                    form="formEditar"
                    :loading="form.processing"
                    class="my-5"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing || v$.form.$invalid"
                  >
                    guardar
                    {{ form.progress ? `${form.progress.percentage}% ` : "" }}
                  </JetButton>
                </div>
              </div>
            </div>
            <!-- Contraseña -->
            <div class="w-full xs:w-full sm:w-full md:w-1/2 xl:w-1/2">
              <div class="mb-4 sm:ml-2 xl:ml-2">
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
                  <form id="formEditarPass" @submit.prevent="EditarPassword">
                    <div>
                      <JetLabel class="laradash-JetLabel"
                        >Nueva contraseña</JetLabel
                      >
                      <JetInput
                        class="mt-1 block w-full"
                        type="password"
                        v-model.trim="formPass.password"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.formPass.password.$error,
                        }"
                        placeholder="Escribir la nueva contraseña"
                      />
                      <div
                        v-if="errors['form.password']"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors["form.password"] }}
                      </div>
                      <div
                        v-for="(error, index) of v$.formPass.password.$errors"
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
                      <JetLabel class="laradash-JetLabel"
                        >Confirmar contraseña</JetLabel
                      >
                      <JetInput
                        class="mt-1 block w-full"
                        type="password"
                        v-model.trim="formPass.password_confirmation"
                        :class="{
                          'border-red-300 focus:border-red-300 focus:ring focus:ring-red-200':
                            v$.formPass.password_confirmation.$error,
                        }"
                        placeholder="Repite la contraseña"
                      />
                      <div
                        v-if="errors['form.password_confirmation']"
                        class="text-xs px-2 py-2 text-red-400 dark:text-red-400"
                      >
                        {{ errors["form.password_confirmation"] }}
                      </div>
                      <div
                        v-for="(error, index) of v$.formPass
                          .password_confirmation.$errors"
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
                  </form>
                  <JetButton
                    form="formEditarPass"
                    :loading="formPass.processing"
                    class="my-3"
                    :class="{ 'opacity-25': BtnEditarPass }"
                    :disabled="v$.formPass.$invalid || BtnEditarPass"
                  >
                    Editar contraseña
                    {{
                      formPass.progress
                        ? `${formPass.progress.percentage}% `
                        : ""
                    }}
                  </JetButton>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      {{persona}}
      
    </div>
  </MainLayout>
  
</template>

<script>
import { defineComponent } from "vue";
import MainLayout from "@/Layouts/MainLayout.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";
import JetButton from "@/Componentes/Button.vue";
import JetButtonLight from "@/Componentes/ButtonLight.vue";
import JetSecondaryButtonLight from "@/Componentes/SecondaryButtonLight.vue";
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

export default defineComponent({
  components: {
    Head,
    MainLayout,
    Link,
    JetButton,
    JetButtonLight,
    JetSecondaryButtonLight,
    JetLabel,
    JetInput,
  },
  props: {
    usuarios: Object,
    roles: Object,
    errors: Object,
    persona: Object,
  },
  setup() {
    return { v$: useVuelidate() };
  },
  data() {
    return {
      DatosTrabajador: [],
      userexists: true,
      form: this.$inertia.form({
        _method: "PUT",
        id: this.$props.usuarios.id,
        nombres: this.$props.persona.nombres,
        apellidopaterno: this.$props.persona.apellidoPaterno,
        apellidomaterno: this.$props.persona.apellidoMaterno,
        telefono: this.$props.persona.telefono,
        name: this.$props.usuarios.name,
        email: this.$props.usuarios.email,
        photo: this.$props.usuarios.profile_photo_path,
        profile_photo_url: this.$props.usuarios.profile_photo_url,
        rolId: this.$props.usuarios.roles[0].id,
      }),
      formPass: this.$inertia.form({
        id: this.$props.usuarios.id,
        _method: "PUT",
        password: "",
        password_confirmation: "",
      }),

      fotoPrevia: "",
      BtnEditarPass: false,
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


        name: {
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
        rolId: {
          required: helpers.withMessage(
            "Este campo no puede estar vacío",
            required
          ),
          $autoDirty: true,
        },
      },
      formPass: {
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
            sameAs(this.formPass.password)
          ),

          $autoDirty: true,
        },
      },
    };
  },
  methods: {
    llenarnombre(id, nombre) {
      console.log(id + "-" + nombre);
      this.form.name = nombre;
      this.form.trabajadorid = id;
      this.DatosTrabajador = [];
      

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
    },

    EditarPerfil() {
      if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0];
      }

      this.form.post(
        this.route("usuarios.update", this.form.id),

        {
          onSuccess: () => {
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Usuario actualizado correctamente",
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
                text: "Usuario no actualizado",
              },
              2000
            );
          },
        }
      );
    },
    seleccionarNuevaFoto() {
      this.$refs.photo.click();
      //console.log(this.form);
    },
    actualizaFotoPrevia() {
      let foto = this.$refs.photo.files[0];
      if (!foto) return;
      let reader = new FileReader();
      reader.onload = (e) => {
        this.fotoPrevia = e.target.result;
      };
      reader.readAsDataURL(foto);
    },
    eliminarFoto() {
      this.$inertia.post(
        route("usuarios.eliminarFoto"),
        { form: this.form },
        {
          onSuccess: () => {
            this.fotoPrevia = "";
            this.form.photo = "";
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Foto eliminada correctamente",
              },
              2000
            );
          },
          onError: (errors) => {
            console.log(errors);
            this.$notify(
              {
                group: "mensajes",
                type: "error",
                title: "Error",
                text: "Foto no eliminada",
              },
              2000
            );
          },
        }
      );
    },
    EditarPassword() {
      this.BtnEditarPass = true;
      this.$inertia.post(
        this.route("usuarios.password"),
        {
          form: this.formPass,
        },
        {
          onSuccess: () => {
            
            this.BtnEditarPass = false;
            this.$notify(
              {
                group: "mensajes",
                type: "success",
                title: "Exíto",
                text: "Contraseña actualizada correctamente",
              },
              2000
            );
          },
          onError: (errors) => {
            this.BtnEditarPass = false;
            this.$notify(
              {
                group: "mensajes",
                type: "error",
                title: "Error",
                text: "Contraseña no actualizada",
              },
              2000
            );
          },
        }
      );
    },
  },
});
</script>
