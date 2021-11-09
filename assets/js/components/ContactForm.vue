<template>
  <div class="flex flex-col h-full">
    <div class="w-full bg-green-400 p-5 text-white font-size-xl mb-5" v-if="success">
      <span>Ihre Nachricht wurde erfolgreich gesendet, wir werden uns so bald als möglich mit Ihnen in Kontakt setzten.</span>
    </div>
    <div class="w-full bg-red-400 p-5 text-white font-size-xl mb-5" v-if="globalError">
      <span>Es war leider nicht möglich Ihre Nachricht zu senden, bitte verwenden Sie eine andere Kontaktart.</span>
    </div>
    <div class="grid lg:grid-cols-2 gap-4">
      <div>
        <label>Name</label>
        <input type="text" v-model="values.name" class="border-b w-full" :class="{'border-red-400': errors.name }" required>
        <small class="text-xs text-red-400" v-if="errors.name" v-text="errors.name"></small>
      </div>
      <div>
        <label>E-Mail</label>
        <input type="email" v-model="values.email" class="border-b w-full" :class="{'border-red-400': errors.email }" required>
        <small class="text-xs text-red-400" v-if="errors.email" v-text="errors.email"></small>
      </div>
    </div>
    <div class="grid lg:grid-cols-2 gap-4 mt-5">
      <div class="col-span-2">
        <label>Betreff</label>
        <input type="text" v-model="values.subject" class="border-b w-full" :class="{'border-red-400': errors.subject }" required>
        <small class="text-xs text-red-400" v-if="errors.subject" v-text="errors.subject"></small>
      </div>
    </div>
    <div class="grid lg:grid-cols-2 gap-4 mt-5">
      <div class="col-span-2">
        <label>Ihre Anfrage</label>
        <textarea class="border w-full" rows="10" v-model="values.message" required :class="{'border-red-400' : errors.message }"></textarea>
        <small class="text-xs text-red-400" v-if="errors.message" v-text="errors.message"></small>
      </div>
    </div>
    <div class="grid lg:grid-cols-2 gap-4 mt-5">
      <div class="col-span-2">
        <button class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg" @click="validate">
          Anfrage senden
        </button>
      </div>
    </div>
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