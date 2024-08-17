<template>
    <div class="background-container">
        <!-- <h1>Create Your Profile</h1> -->
        <div class="step-card">
            <a-steps type="navigation"  :current="current" :items="items" size="small" @change="stepChanged"></a-steps>
            <div class="steps-content" v-if="current==0" >
                <a-form ref="formRef1" :model="formStateStep1" layout="vertical" :label-col="labelCol" :wrapper-col="wrapperCol" >
                    <a-row type="flex" justify="space-around" align="middle">
                        <a-col  :sm="22" :md="22" :lg="22" >
                            <a-form-item label="Email" name="email" :rules="[{ required: true, message: 'Please input your email!' }]">
                            <a-input v-model:value="formStateStep1.email" />
                            </a-form-item>
                        </a-col>
                        <a-col  :sm="22" :md="22" :lg="22" >
                            <a-form-item label="Password" name="email" :rules="[{ required: true, message: 'Please input your password!' }]">
                            <a-input-password v-model:value="formStateStep1.password" placeholder="input password" />
                            </a-form-item>
                        </a-col>

                    </a-row>
                </a-form>
            </div>
            <div class="steps-content " v-if="current==1">
                <a-form ref="formRef2":model="formStateStep2" layout="vertical"  >
                    <a-row type="flex" justify="start" align="middle">
                        <a-col :xs="24" :sm="24" :md="12" :lg="12" >
                            <a-form-item label="Financial Material">
                            <a-select v-model:value="formStateStep2.isFinancialMaterial" >
                                <a-select-option value="Yes">Yes</a-select-option>
                                <a-select-option value="No">No</a-select-option>
                            </a-select>
                            </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item >
                              <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.financialMaterial" />
                            </a-form-item>
                        </a-col>
                        <a-divider />
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item  label="A summary of fuel economy and use-phase emissions disclosure">
                              <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.fuelEconomy" />
                            </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item  label="TR-AU-410a.1 - Fleet fuel economy, sales-weighted average">
                              <a-input type="number" :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.fleetFuelEconomyAverage" />
                            </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                          <a-form-item  label="TR-AU-410a.2 - Vehicles sold">
                            <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.vehiclesSoldHybrid" addon-before="Hybrid vehicles"  />
                          </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                          <a-form-item >
                            <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.vehiclesSoldPlugIn" addon-before="Plug-in vehicles"  />
                          </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                          <a-form-item >
                            <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.vehiclesSoldZeroEmission" addon-before="Zero-emission vehicles"  />
                          </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item  label="TR-AU-410a.3 - Strategies and approaches to managing fleet fuel economy and emissions risks and opportunities">
                              <a-input :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.fleetFuelEconomyStrategies" />
                            </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item  label="TR-AU-000.A - Vehicles manufactured">
                              <a-input type="number" :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.vehiclesManufactured" />
                            </a-form-item>
                        </a-col>
                        <a-col :xs="24" :sm="24" :md="22" :lg="22" >
                            <a-form-item  label="TR-AU-000.B - Vehicles sold">
                              <a-input type="number" :disabled="formStateStep2.isFinancialMaterial=='No' ? true: false" v-model:value="formStateStep2.vehiclesSold" />
                            </a-form-item>
                        </a-col>
                      
                    </a-row>
                </a-form>
            </div>
            <div class="steps-content" v-if="current==2">
                <a-button >Finish</a-button>
            </div>

            <div class="steps-action">
            <a-button v-if="current < steps.length - 1" type="primary"  @click="next">Next</a-button>
            <a-button
                v-if="current == steps.length - 1"
                type="primary"
                @click="message.success('Processing complete!')"
            >
                Done
            </a-button>
            <a-button v-if="current > 0" style="margin-left: 8px" @click="prev">Previous</a-button>
            </div>
        </div>

       
    </div>
</template>

<script lang="ts" setup>
import { ref,reactive,toRaw } from 'vue';
import type { UnwrapRef } from 'vue';
import { message } from 'ant-design-vue';

// Data


const current = ref<number>(0);
  const steps = [
  {
    title: 'Registration',
    status: 'wait',
    content: 'First-content',
  },
  {
    title: 'Information',
    status: 'wait',
    content: 'Second-content',
  },
  {
    title: 'Finish',
    status: 'wait',
    content: 'Last-content',
  },
];
const items = steps.map(item => ({ key: item.title, title: item.title }));
const formRef1:any = ref(null);
const formRef2:any = ref(null);


const formStateStep1 = reactive({
  password: '',
  email: '',
});


const formStateStep2 = reactive({
  isFinancialMaterial: '',
  financialMaterial: '',
  fuelEconomy: '',
  fleetFuelEconomyAverage: 0,
  vehiclesSoldHybrid: '',
  vehiclesSoldPlugIn: '',
  vehiclesSoldZeroEmission: '',
  fleetFuelEconomyStrategies: '',
  vehiclesManufactured: 0,
  vehiclesSold: 0,
});



const labelCol = { style: { width: '80px' } };
const wrapperCol = { span: 22 };

// Methods
const next = async() => {
    if(current.value==0){
      const val = await submitForm1();
      console.log('val', val);
      if(val == false){
        return;
      }
    }
    if(current.value==1){
        if(formStateStep2.isFinancialMaterial==''){
            message.error('Please fill all the fields');
            return;
        }
    }
    current.value++;
    console.log('next', current.value);
};
const prev = () => {
  current.value--;
};

const stepChanged = (currentStep: number) => {
    console.log('stepChanged', currentStep);
//   current.value = currentStep;
};

const submitForm1 = async() => {
     let valid =  formRef1.value?.validate().then(() => {
          message.success('Form submitted!');
          console.log('formStateStep1', toRaw(formStateStep1));
          return false;
        }).catch((error) => {
          console.log("From validation failed");
          message.error('Please fill all the fields');
          return false;
        });
    
};



const submitForm = () => {
    message.success('Form submitted!');
    // Implement form submission logic here
};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Proxima+Nova:wght@400;700&display=swap');
.step-card {
  width: 100%;
  max-width: 900px;
  margin: 0 auto;
  padding: 24px;
  background-color: #fff;
  border-radius: 6px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  font-family: 'Proxima Nova', sans-serif;
  z-index: 1 ;
}
.steps-content {
  margin-top: 16px;
  /* border: 1px dashed #FFD301; */
  border-radius: 6px;
  /* background-color: #fafafa; */
  min-height: 200px;
  padding-top: 30px;
  align-content: center;

  /* scroll CSS */

  /* width: 100%; */
  /* max-width: 600px; */
  /* Fixed height */
  max-height: 500px;
  /* margin: 0 auto; */
  /* padding: 20px; */
  /* border: 1px solid #ccc; */
  
  /* Vertical scrolling */
  overflow-y: auto;
  /* background-color: #f9f9f9; */
}

.steps-action {
  margin-top: 24px;
}

[data-theme='dark'] .steps-content {
  background-color: #2f2f2f;
  border: 1px dashed #404040;
}
</style>
