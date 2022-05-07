<!-- PersonInput.vue -->
<template>
  <div>
    <input type="text" :value="person.name" @input="$emit('updatePerson', { name: $event })" />
  </div>
</template>

<script>
import { defineComponent} from "vue";
import useVuelidate from '@vuelidate/core';
import { minLength, required } from '@vuelidate/validators';

export default defineComponent({
  props: {
    person: { type: Object, required: true },
  },
  setup () {

    
    return { v$: useVuelidate() }
  },
  validations: {
    person: {
      required,
      minLength: minLength(2),
    }
  }
})
</script>