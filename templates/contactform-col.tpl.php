<template scope="{ success, globalError, values, errors, validate }">
    <div class="flex flex-col h-full">
        <div class="w-full bg-green-400 p-5 text-white font-size-xl mb-5" v-if="success">
            <span><?php __('Ihre Nachricht wurde erfolgreich gesendet, wir werden uns so bald als möglich mit Ihnen in Kontakt setzten.', 'davincigroup') ?></span>
        </div>
        <div class="w-full bg-red-400 p-5 text-white font-size-xl mb-5" v-if="globalError">
            <span><?php echo __('Es war leider nicht möglich Ihre Nachricht zu senden, bitte verwenden Sie eine andere Kontaktart.', 'davincigroup') ?></span>
        </div>
        <div class="mt-5">
            <label><?php _e('Ihr Name', 'davincigroup') ?></label>
            <input type="text" v-model="values.name" class="border-b w-full" :class="{'border-red-400': errors.name }" required>
            <small class="text-xs text-red-400" v-if="errors.name" v-text="errors.name"></small>
        </div>
        <div class="mt-5">
            <label><?php _e('Ihre E-Mail-Adresse', 'davincigroup') ?></label>
            <input type="email" v-model="values.email" class="border-b w-full" :class="{'border-red-400': errors.email }" required>
            <small class="text-xs text-red-400" v-if="errors.email" v-text="errors.email"></small>
        </div>
        <div class="mt-5">
            <label><?php _e('Betreff', 'davincigroup') ?></label>
            <input type="text" v-model="values.subject" class="border-b w-full" :class="{'border-red-400': errors.subject }" required>
            <small class="text-xs text-red-400" v-if="errors.subject" v-text="errors.subject"></small>
        </div>
        <div class="mt-5">
            <label><?php _e('Ihre Anfrage', 'davincigroup') ?></label>
            <textarea class="border w-full" rows="10" v-model="values.message" required :class="{'border-red-400' : errors.message }"></textarea>
            <small class="text-xs text-red-400" v-if="errors.message" v-text="errors.message"></small>
        </div>
        <div class="mt-5">
            <button class="bg-golden text-white w-full py-3 hover:font-semibold hover:shadow-none shadow-lg" @click="validate">
                <?php echo __(' Anfrage senden', 'davincigroup') ?>
            </button>
        </div>
    </div>
</template>
