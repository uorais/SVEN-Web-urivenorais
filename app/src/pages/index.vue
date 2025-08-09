<template>
  <div class="container">
    <v-row class="general">
      <v-col cols="12" md="6">
        <div class="left">
          <div class="avatar-container">
            <v-avatar class="logo-image" color="white" size="64">
              <v-img alt="Pawtastic" :src="LogoImage"></v-img>
            </v-avatar>
            <div class="avatar-text">PAWTASTIC</div>
          </div>
        </div>
      </v-col>

      <v-col cols="12" md="6">
        <div class="right">
          <div class="header-hero d-flex ga-12">
            <div>
              <a href="#about-us" class="scroll-link">About us</a>
            </div>
            <div>
              <a href="#appointment-form" class="scroll-link"
                >Schedule a visit</a
              >
            </div>
          </div>

          <div class="header-text">
            We care for your furry little loved ones while
          </div>
          <v-btn
            class="header-btn"
            rounded="xl"
            size="x-large"
            variant="flat"
            @click="scrollToSection('appointment-form')"
            >Schedule a visit</v-btn
          >
        </div>
      </v-col>

      <div class="bottom-text">Ozzy in Brooklyn</div>
    </v-row>
    <v-row class="about">
      <v-col cols="12" md="6">
        <div class="about-left">
          <div class="about-header">
            Expert care for your furry, feathery, or scaley friend
          </div>
          <div class="about-body">
            We know how stressful it is to leave your pets at home alone. We're
            a team of experienced animal caregivers, well connected to local
            veterinarians. Trust to us to love them like our own, and to keep
            them safe and happy till you're home.
          </div>
          <v-btn
            class="about-btn"
            @click="scrollToSection('appointment-form')"
            rounded="xl"
            size="x-large"
            variant="flat"
            >Schedule a visit</v-btn
          >
        </div>
      </v-col>

      <v-col cols="12" md="6">
        <div class="about-right" id="about-us">
          <v-row>
            <v-col cols="6">
              <div class="image-wrapper">
                <v-img :src="CatImage" alt="Muffin" aspect-ratio="1"></v-img>
                <div class="image-label">Muffin</div>
              </div>
            </v-col>
            <v-col cols="6">
              <div class="image-wrapper">
                <v-img :src="ParrotImage" alt="Peep" aspect-ratio="1"></v-img>
                <div class="image-label">Peep</div>
              </div>
            </v-col>
            <v-col cols="6">
              <div class="image-wrapper">
                <v-img :src="DogImage" alt="Natasha" aspect-ratio="1"></v-img>

                <div class="image-label">Natasha</div>
              </div>
            </v-col>
            <v-col cols="6">
              <div class="image-wrapper">
                <v-img
                  :src="HamsterImage"
                  alt="Marlon"
                  aspect-ratio="1"
                ></v-img>

                <div class="image-label">Marlon</div>
              </div>
            </v-col>
          </v-row>
        </div>
      </v-col>
    </v-row>
    <v-row class="appointment equal-height" id="appointment-form" no-gutters>
      <v-col cols="12" md="5">
        <div class="appointment-left flex-grow-1">
          <div class="avatar-container">
            <v-avatar
              class="logo-image"
              @click="scrollToTop"
              color="#EBD0CE"
              size="64"
            >
              <v-img alt="Pawtastic" :src="LogoImage"></v-img>
            </v-avatar>
            <div class="avatar-text">PAWTASTIC</div>
          </div>

          <div class="appointment-header">All services include:</div>
          <ul class="appointment-list">
            <li>A photo update for you along</li>
            <li>Notifications of sitter arrival</li>
            <li>Treats for your pet, with your</li>
          </ul>

          <v-img
            :src="DoodleImage"
            alt="Bottom image"
            class="bottom-image"
            contain
          ></v-img>
        </div>
      </v-col>

      <v-col cols="12" md="7">
        <div class="appointment-right">
          <div class="form-header">
            We'll take your dog for a walk. Just tell us when!
          </div>

          <v-form ref="form" @submit.prevent="submitForm">
            <v-row class="form-container" align="center">
              <v-col class="mb-2" cols="12" md="6">
                <label class="form-label">Frequency</label>
                <div class="switch-container">
                  <v-btn-toggle
                    v-model="selectedOption"
                    mandatory
                    class="toggle-options"
                    rounded
                    style="gap: 8px"
                  >
                    <v-btn
                      active-color="#EBD0CE"
                      value="recurring"
                      class="square-btn"
                      >Recurring</v-btn
                    >
                    <v-btn
                      active-color="#EBD0CE"
                      value="one-time"
                      class="square-btn"
                      >One time</v-btn
                    >
                  </v-btn-toggle>
                </div>
              </v-col>

              <v-col class="mb-2" cols="12" md="6">
                <label class="form-label">Start Date</label>
                <v-menu
                  v-model="menu"
                  :close-on-content-click="false"
                  transition="scale-transition"
                  offset-y
                  min-width="auto"
                >
                  <template #activator="{ props }">
                    <v-text-field
                      ref="dateField"
                      class="date-input"
                      placeholder="MM/DD/YYYY"
                      v-model="formattedDate"
                      :rules="[requiredRule, futureDateRule]"
                      lazy-rules
                      variant="plain"
                      density="compact"
                      readonly
                      v-bind="props"
                    />
                  </template>

                  <v-date-picker
                    v-model="date"
                    no-title
                    hide-header
                    no-actions
                    scrollable
                    @update:modelValue="menu = false"
                  />
                </v-menu>
              </v-col>
              <v-col class="mb-2" cols="12">
                <label class="form-label">Days - Select all that apply</label>
                <div class="days-container">
                  <v-btn-toggle
                    v-model="selectedDays"
                    @update:modelValue="onSelectedDaysChange"
                    multiple
                    class="days-grid"
                  >
                    <v-btn
                      v-for="day in days"
                      :key="day.value"
                      :value="day.value"
                      active-color="#EBD0CE"
                      class="day-btn"
                    >
                      {{ day.label }}
                    </v-btn>
                  </v-btn-toggle>
                </div>

                <div class="error-wrapper">
                  <transition name="v-messages-transition">
                    <div v-if="errors.days" class="error-label">
                      Please select at least one day
                    </div>
                  </transition>
                </div>
              </v-col>

              <v-col class="mb-2" cols="12">
                <label class="form-label">Times - Select all that apply</label>
                <div class="days-container">
                  <v-btn-toggle
                    v-model="selectedTimes"
                    @update:modelValue="onSelectedTimesChange"
                    multiple
                    class="times-grid"
                  >
                    <v-btn
                      v-for="time in times"
                      :key="time.value"
                      :value="time.value"
                      active-color="#EBD0CE"
                      class="day-btn"
                    >
                      {{ time.label }}
                    </v-btn>
                  </v-btn-toggle>
                </div>

                <div class="error-wrapper">
                  <transition name="v-messages-transition">
                    <div v-if="errors.times" class="error-label">
                      Please select at least one timeframe
                    </div>
                  </transition>
                </div>
              </v-col>

              <v-col cols="12">
                <label class="form-label">Notes for your sitter</label>
                <v-textarea
                  v-model="note"
                  class="textarea-input"
                  placeholder="Route preferences, leash locations, treats given, etc..."
                  variant="plain"
                  hide-details
                  rows="3"
                  max-rows="3"
                  auto-grow
                />
              </v-col>

              <v-col cols="12" class="text-center">
                <v-btn
                  class="form-btn"
                  type="submit"
                  rounded="xl"
                  size="x-large"
                  variant="flat"
                  :loading="loading"
                  >Schedule Service</v-btn
                >
              </v-col>
            </v-row>
          </v-form>
        </div>
      </v-col>
    </v-row>
  </div>

  <v-snackbar v-model="snackbar" :timeout="3000" top right>
    {{ message }}
  </v-snackbar>
</template>

<script setup>
import LogoImage from "@/assets/logo.svg";
import DogImage from "@/assets/dog.svg";
import CatImage from "@/assets/cat.svg";
import ParrotImage from "@/assets/parrot.svg";
import HamsterImage from "@/assets/hamster.svg";
import DoodleImage from "@/assets/doodle.png";
import axios from "axios";
import moment from "moment";
import { ref, computed, watch } from "vue";

const days = ref([
  { label: "Mon", value: "monday" },
  { label: "Tue", value: "tuesday" },
  { label: "Wed", value: "wednesday" },
  { label: "Thu", value: "thursday" },
  { label: "Fri", value: "friday" },
  { label: "Sat", value: "saturday" },
  { label: "Sun", value: "sunday" },
]);
const times = ref([
  { label: "Morning", value: "morning" },
  { label: "Afternoon", value: "afternoon" },
  { label: "Evening", value: "evening" },
]);

const menu = ref(false);
const loading = ref(false);
const snackbar = ref(false);
const message = ref("");

const form = ref(null);
const selectedOption = ref("recurring");
const selectedDays = ref([]);
const selectedTimes = ref([]);
const date = ref(null);
const note = ref("");
const errors = ref({
  days: false,
  times: false,
});

const requiredRule = (v) => !!v || "This field is required";

const futureDateRule = (v) => {
  if (!v) {
    return "Start date is required";
  }

  return (
    moment(new Date(v)).isSameOrAfter(moment(new Date()).startOf("day")) ||
    "Please select today or a future date"
  );
};

const resetForm = () => {
  selectedOption.value = "recurring";
  date.value = null;
  selectedDays.value = [];
  selectedTimes.value = [];
  note.value = null;

  nextTick(() => {
    form.value.resetValidation();
  });
};

const submitForm = async () => {
  const { valid } = await form.value.validate();

  errors.value.days = !selectedDays.value.length;
  errors.value.times = !selectedTimes.value.length;

  if (!valid || errors.value.days || errors.value.times) {
    return;
  }

  loading.value = true;

  try {
    await axios.post("http://localhost:8000/api/appointments", {
      frequency: selectedOption.value,
      days: selectedDays.value,
      times: selectedTimes.value,
      start_date: moment(date.value).format("YYYY-MM-DD"),
      note: note.value,
    });

    message.value = "Success! We've saved your appointment.";

    resetForm();
  } catch (error) {
    console.error("[ERROR]", error);

    message.value = "Something went wrong. Please try again later.";
  }

  loading.value = false;
  snackbar.value = true;
};

const formattedDate = computed(() => {
  return date.value ? moment(date.value).format("MM/DD/YYYY") : "";
});

function scrollToSection(sectionId) {
  const section = document.getElementById(sectionId);

  if (section) {
    section.scrollIntoView({ behavior: "smooth" });
  }
}

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}

const onSelectedDaysChange = (value) => {
  errors.value.days = !value.length;
};

const onSelectedTimesChange = (value) => {
  errors.value.times = !value.length;
};
</script>

<style scoped lang="scss">
.general {
  background-image: url("@/assets/general.svg");
  background-size: cover;
  background-position: center;
  background-repeat: no-repeat;
  color: white;
  box-sizing: border-box;
  margin: 0 auto;
  min-height: 950px;

  @media (max-width: 600px) {
    background-size: cover;
    background-position: center center;
    min-height: auto;
    padding: 1rem;
  }

  .header-hero {
    font-size: 24px;

    @media (max-width: 600px) {
      font-size: 18px !important;
    }
  }

  .header-text {
    font-size: 72px;
    line-height: 95px;
    font-weight: bolder;
    margin-top: 80px;

    @media (max-width: 600px) {
      font-size: 32px !important;
      line-height: normal !important;
      margin-top: 2rem !important;
    }
  }

  .header-btn {
    margin: 60px 0;
    font-size: 28px;
    text-transform: none;
    padding: 12px 52px;
    border-radius: 9999px !important;
    letter-spacing: 0.03em;
    color: #9597a6;
    background-color: white;
    transition: background-color 0.3s ease, color 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: auto;

    &:hover {
      background-color: #ebd0ce;
      color: #545871;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      font-size: 20px !important;
      padding: 10px 30px !important;
      margin: 2rem 0 !important;
      height: auto !important;
    }
  }

  .left {
    padding: 5% 15% 5% 10%;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;

    @media (max-width: 600px) {
      padding: 1rem !important;
    }
  }

  .bottom-text {
    margin-top: auto;
    text-align: center;
    padding: 50px 100px;
    color: white;

    @media (max-width: 600px) {
      padding: 2rem 1rem 2rem 2rem !important;
    }
  }

  .right {
    padding: 20% 15% 0 25%;

    @media (max-width: 600px) {
      padding: 1rem !important;
    }
  }

  .avatar-container {
    display: flex;
    align-items: center;
    gap: 20px;

    @media (max-width: 600px) {
      gap: 10px !important;
    }
  }

  .avatar-text {
    font-size: 24px;
    letter-spacing: 2px;

    @media (max-width: 600px) {
      font-size: 16px !important;
      letter-spacing: 1.5px !important;
    }
  }

  .scroll-link {
    cursor: pointer;
    color: white;
    text-decoration: none;
    transition: color 0.3s ease;

    &:hover {
      color: #ebd0ce;
    }

    @media (max-width: 600px) {
      border-radius: 5px;
    }
  }
}

.about {
  box-sizing: border-box;
  margin: 0 auto;
  padding: 50px 0;

  @media (max-width: 600px) {
    padding: 1rem;
  }

  .about-header {
    color: #545871;
    font-size: 54px;
    line-height: 80px;
    font-weight: bolder;
    margin-bottom: 40px;

    @media (max-width: 600px) {
      font-size: 1.8rem;
      line-height: normal;
    }
  }

  .about-left,
  .about-right {
    padding: 5% 15% 5% 10%;

    @media (max-width: 600px) {
      padding: 1rem !important;
    }
  }

  .about-right {
    padding-top: 0 !important;

    @media (max-width: 600px) {
      padding: 1rem !important;
    }
  }

  .about-body {
    color: #545871;
    font-size: 28px;

    @media (max-width: 600px) {
      font-size: 1rem;
    }
  }

  .about-btn {
    margin-top: 80px;
    font-size: 28px;
    text-transform: none;
    padding: 12px 52px;
    border-radius: 9999px !important;
    letter-spacing: 0.03em;
    color: white;
    background-color: #545871;
    transition: background-color 0.3s ease, color 0.3s ease;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    height: auto;

    &:hover {
      background-color: #ebd0ce;
      color: #545871;
      cursor: pointer;
    }

    @media (max-width: 600px) {
      font-size: 20px !important;
      padding: 10px 30px !important;
      margin: 2rem 0 !important;
      height: auto !important;
    }
  }

  .image-wrapper {
    position: relative;
  }

  .image-label {
    position: absolute;
    bottom: 10px;
    left: 10px;
    color: white;
    padding: 4px 8px;
    font-size: 14px;
  }
}

.equal-height {
  align-items: stretch;
}

.appointment {
  box-sizing: border-box;
  margin: 0 auto;

  @media (max-width: 600px) {
    padding: 0;
  }

  .avatar-container {
    display: flex;
    align-items: center;
    gap: 20px;

    @media (max-width: 600px) {
      gap: 10px !important;
      padding: 1rem !important;
    }
  }

  .avatar-text {
    color: white;
    font-size: 24px;
    letter-spacing: 2px;

    @media (max-width: 600px) {
      font-size: 16px !important;
      letter-spacing: 1.5px !important;
    }
  }

  .appointment-header {
    color: white;
    font-size: 48px;
    font-weight: bolder;
    margin-top: 50px;

    @media (max-width: 600px) {
      font-size: 1.8rem;
      line-height: normal;
      padding: 1rem !important;
      margin-top: 0;
    }
  }

  .appointment-list {
    color: white;
    font-size: 24px;
    padding-left: 1px;
    list-style-position: inside;

    li {
      margin: 40px 0;

      @media (max-width: 600px) {
        margin: 20px 0;
      }
    }

    @media (max-width: 600px) {
      font-size: 1rem;
      padding: 0 1rem 280px 1rem;
    }
  }

  .bottom-image {
    position: absolute;
    left: -180px;
    bottom: 0;
    height: 400px;
    width: 100%;
    object-fit: contain;

    @media (max-width: 600px) {
      left: 0;
      height: 300px;
    }
  }

  .appointment-left,
  .appointment-right {
    display: flex;
    flex-direction: column;
  }

  .appointment-left {
    position: relative;
    background-color: #545871;
    padding: 10% 15% 5% 10%;
    height: 100%;

    @media (max-width: 600px) {
      padding: 16px !important;
    }
  }

  .appointment-right {
    background-color: #f7eceb;
    padding: 7% 15% 5% 15%;

    @media (max-width: 600px) {
      padding-top: 0 !important;
      padding: 1rem !important;
    }

    .form-container {
      @media (max-width: 600px) {
        padding: 1rem !important;
      }
    }

    .form-header {
      color: #545871;
      font-size: 54px;
      line-height: 62px;
      font-weight: bolder;
      margin-bottom: 70px;

      @media (max-width: 600px) {
        font-size: 1.8rem;
        padding: 1rem !important;
        line-height: normal;
        margin-bottom: 20px;
      }
    }

    .form-label {
      display: block;
      margin-bottom: 12px;
      color: #9597a6;
    }

    ::v-deep(.v-input__details) {
      margin-top: 12px;
      margin-left: 10px;

      .v-messages {
        font-size: 14px;
      }
    }

    .switch-container {
      display: flex;
      align-items: center;
      padding: 8px;
      border-radius: 4px;
      background-color: white;
      width: 100%;
    }

    .square-btn {
      font-size: 14px;
      height: 22px;
      border-radius: 4px !important;
      text-transform: none !important;
      padding: 0 25px;
    }

    .toggle-options {
      height: 32px;
      display: flex;
      flex: 1;
      overflow-x: hidden;
    }

    ::v-deep(.toggle-options .v-btn) {
      flex: 1 1 0 !important;
      max-width: none !important;
      height: 32px;
      font-size: 16px;
      border-radius: 4px !important;
      text-transform: none !important;
      color: #9597a6 !important;
    }

    ::v-deep(.date-input) {
      border-radius: 4px;
      background-color: white;
      height: 48px !important;

      .v-field__input {
        padding-top: 12px !important;
        padding-left: 15px;
        color: #ebd0ce !important;
      }

      input::placeholder {
        color: #ebd0ce !important;
        opacity: 1;
      }
    }

    .date-input .v-field__input {
      min-height: 48px !important;
      padding-top: 5px !important;
      padding-bottom: 0 !important;
    }

    ::v-deep(.textarea-input) {
      border-radius: 4px;
      background-color: white;

      .v-field__input {
        padding: 15px;
        color: #ebd0ce !important;
      }

      textarea::placeholder {
        color: #ebd0ce !important;
        opacity: 1;
      }
    }

    .days-container {
      display: inline-flex;
      align-items: center;
      border-radius: 4px;
      width: 100%;
    }

    .days-grid,
    .times-grid {
      display: grid !important;
      grid-template-columns: repeat(auto-fit, minmax(80px, 1fr));
      gap: 8px;
      width: 100%;
      height: 100%;
      overflow-x: hidden;
    }

    .day-btn {
      height: 48px !important;
      color: #9597a6 !important;
      background-color: white;
      border-radius: 4px;
      font-size: 16px;
      font-family: "Open Sans", sans-serif;
      text-transform: none;
    }

    .form-btn {
      margin-top: 70px;
      font-size: 28px;
      text-transform: none;
      padding: 12px 52px;
      border-radius: 9999px !important;
      letter-spacing: 0.03em;
      color: white;
      background-color: #545871;
      transition: background-color 0.3s ease, color 0.3s ease;
      display: inline-flex;
      align-items: center;
      justify-content: center;
      height: auto;

      &:hover {
        cursor: pointer;
      }

      @media (max-width: 600px) {
        font-size: 20px !important;
        padding: 10px 30px !important;
        margin: 2rem 0 !important;
        height: auto !important;
      }
    }
  }

  .error-wrapper {
    position: relative;
  }

  .error-label {
    position: absolute;
    top: 4px;
    left: 10px;
    color: #b00020;
    font-size: 14px;
  }

  /* Vuetify style animation for v-messages */
  .v-messages-transition-enter-active,
  .v-messages-transition-leave-active {
    transition: opacity 0.15s ease-in-out, transform 0.15s ease-in-out;
  }

  .v-messages-transition-enter-from,
  .v-messages-transition-leave-to {
    opacity: 0;
    transform: translateY(-5px);
  }
}
</style>
