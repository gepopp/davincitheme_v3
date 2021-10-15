<template>
  <div class="flex flex-col h-full">
    <slot v-bind:success="success" v-bind:globalError="globalError" v-bind:values="values" v-bind:errors="errors" v-bind:validate="validate"></slot>
  </div>
</template>

<script>

import axios from 'axios';

export default {
  name: "ContactForm",
  props: ['subject', 'errorMessages'],
  data() {
    return {
      values: {
        name: '',
        email: '',
        subject: this.subject,
        message: ''
      },
      errors: {
        name: false,
        email: false,
        subject: false,
        message: false
      },
      hasError: false,
      success: false,
      globalError: false
    }
  },
  methods: {
    validate() {

      this.resetErrors();

      if (this.values.name == '') {
        this.errors.name = this.errorMessages.name;
        this.hasError = true;
      }

      if (this.values.mail == '' || !this.validateEmail(this.values.email)) {
        this.errors.email = this.errorMessages.email
        this.hasError = true;
      }

      if (this.values.subject == '') {
        this.errors.subject = this.errorMessages.subject
        this.hasError = true;
      }

      if (this.values.message == '') {
        this.errors.message = this.errorMessages.message
        this.hasError = true;
      }

      if (!this.hasError) {

        var params = new URLSearchParams();
        params.append('action', 'contactForm');
        params.append('name', this.values.name);
        params.append('name', this.values.name);
        params.append('email', this.values.email);
        params.append('subject', this.values.subject);
        params.append('message', this.values.message);

        axios.post(window.ajaxurl, params)
          .then((rsp) => {
            this.success = true;
            setTimeout(() => {
              this.success = false
            }, 3000);
          })
          .catch(() => {
            this.globalError = true;
            setTimeout(() => {
              this.globalError = false
            }, 3000);
          })
          .then(() => {
            this.resetErrors();
            this.resetValues();
          })
      }
    },
    resetValues() {
      this.values.name = this.values.email = this.values.message = "";
      this.values.subject = this.subject;
    },
    resetErrors() {
      this.errors.name = this.errors.email = this.errors.subject = this.errors.message = this.hasError = false;
    },
    validateEmail(mail) {
      if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(mail)) {
        return (true)
      }
      return (false)
    }
  }
}
</script>

<style scoped>

</style>