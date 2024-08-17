<template>
    <div class="container">
        <h1>Create Your Profile</h1>
        <div class="stepper">
        <div class="step" :class="{ active: currentStep >= 1 }">1 <span>User Name</span></div>
        <div class="step" :class="{ active: currentStep >= 2 }">2 <span>Location</span></div>
        <div class="step" :class="{ active: currentStep >= 3 }">3 <span>Business</span></div>
        <div class="step" :class="{ active: currentStep >= 4 }">4 <span>Bank</span></div>
        <div class="step" :class="{ active: currentStep >= 5 }">5 <span>Verification</span></div>
        </div>
        <form @submit.prevent="submitForm">
        <section v-if="currentStep === 3">
            <h2>Business Information</h2>
            <p>Provide the necessary details to register your business with us</p>
            <div class="form-group">
            <label for="businessName">Business Name</label>
            <input type="text" id="businessName" v-model="form.businessName" required>
            </div>
            <div class="form-group">
            <label for="businessOwner">Business Owner</label>
            <input type="text" id="businessOwner" v-model="form.businessOwner" required>
            </div>
            <div class="form-group">
            <label for="businessType">Business Type</label>
            <select id="businessType" v-model="form.businessType" required>
                <option value="" disabled>Select from list</option>
                <option value="type1">Type 1</option>
                <option value="type2">Type 2</option>
            </select>
            </div>
            <div class="form-group">
            <label for="identificationNumber">Identification Number</label>
            <input type="text" id="identificationNumber" v-model="form.identificationNumber" required>
            </div>
        </section>
        <div class="form-controls">
            <button type="button" @click="prevStep" v-if="currentStep > 1">Previous</button>
            <button type="submit" v-if="currentStep === 5">Submit</button>
            <button type="button" @click="nextStep" v-else>Next</button>
        </div>
        </form>
    </div>
</template>

<script>
export default {
  data() {
    return {
      currentStep: 3, // Change this based on the current step
      form: {
        businessName: '',
        businessOwner: '',
        businessType: '',
        identificationNumber: ''
      }
    };
  },
  methods: {
    nextStep() {
      if (this.currentStep < 5) {
        this.currentStep++;
      }
    },
    prevStep() {
      if (this.currentStep > 1) {
        this.currentStep--;
      }
    },
    submitForm() {
      alert('Form submitted!');
      // Implement form submission logic here
    }
  }
};
</script>
