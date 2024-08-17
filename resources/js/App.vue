<template>
    <a-config-provider
    :theme="{
      token: {
        colorPrimary: '#24B4FB',
        
      },
    }"
  >
  <router-view v-slot="{ Component, route }">
        <div :key="route.name">
            <Component :is="Component" />
        </div>
    </router-view>
  </a-config-provider>
    
</template>