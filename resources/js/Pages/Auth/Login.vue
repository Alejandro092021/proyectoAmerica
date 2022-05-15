<template>
  <div>
    <Head title="Iniciar sesión" />
    <div class="min-h-screen bg-gray-100 dark:bg-gray-800">
      <div class="sm:justify-center items-center">
        <div v-if="status" class="mb-4 font-medium text-sm text-green-600">
          {{ status }}
        </div>
      </div>

      <div
        class="
          relative
          min-h-screen
          flex flex-col
          sm:justify-center
          items-center
         
          
        "
      >
        <div class="relative  sm:max-w-md  w-full">
          <div
            class="
              card
              bg-blue-400
              shadow-lg
              w-full
              h-full
              rounded-3xl
              absolute
              transform
              -rotate-6
            "
          ></div>
          <div
            class="
              card
              bg-red-400
              shadow-lg
              w-full
              h-full
              rounded-3xl
              absolute
              transform
              rotate-6
            "
          ></div>
          <div
            class="relative w-full  rounded-3xl px-6 py-4 bg-white shadow-md"
          >
            <form @submit.prevent="submit">
              <div class="">
                <div>
                  <jet-validation-errors class="" />
                </div>
              </div>
                <div class="text-center font-medium
                text-gray-600 text-center text-2xl">
                Iniciar sesión
              </div>
              <div>
                <jet-label for="email" value="Email" />
                <jet-input
                  id="email"
                  type="email"
                  class="mt-1 block w-full"
                  v-model="form.email"
                  required
                  autofocus
                />
              </div>

              <div class="mt-4">
                <jet-label for="password" value="Contraseña" />
                <jet-input
                  id="password"
                  type="password"
                  class="mt-1 block w-full"
                  v-model="form.password"
                  required
                  autocomplete="current-password"
                />
              </div>

              <div class="block mt-4">
                <label class="flex items-center">
                  <jet-checkbox
                    name="remember"
                    v-model:checked="form.remember"
                  />
                  <span class="ml-2 text-sm text-gray-600">Recuérdame</span>
                </label>
              </div>

              <div class="flex items-center justify-end mt-4">
                <Link
                  v-if="canResetPassword"
                  :href="route('password.request')"
                  class="underline text-sm text-gray-600 hover:text-gray-900"
                >
                  ¿Olvidaste tu contraseña?
                </Link>

                <jet-button
                  class="ml-4"
                  :class="{ 'opacity-25': form.processing }"
                  :disabled="form.processing"
                >
                  Iniciar
                </jet-button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { defineComponent } from "vue";
import JetAuthenticationCard from "@/Jetstream/AuthenticationCard.vue";
import JetAuthenticationCardLogo from "@/Jetstream/AuthenticationCardLogo.vue";
import JetButton from "@/Componentes/Button.vue";
import JetInput from "@/Jetstream/Input.vue";
import JetCheckbox from "@/Jetstream/Checkbox.vue";
import JetLabel from "@/Jetstream/Label.vue";
import JetValidationErrors from "@/Jetstream/ValidationErrors.vue";
import { Head, Link } from "@inertiajs/inertia-vue3";

export default defineComponent({
  components: {
    Head,
    JetAuthenticationCard,
    JetAuthenticationCardLogo,
    JetButton,
    JetInput,
    JetCheckbox,
    JetLabel,
    JetValidationErrors,
    Link,
  },

  props: {
    canResetPassword: Boolean,
    status: String,
  },

  data() {
    return {
      form: this.$inertia.form({
        email: "",
        password: "",
        remember: false,
      }),
    };
  },

  methods: {
    submit() {
      this.form
        .transform((data) => ({
          ...data,
          remember: this.form.remember ? "on" : "",
        }))
        .post(this.route("login"), {
          onFinish: () => this.form.reset("password"),
        });
    },
  },
});
</script>
