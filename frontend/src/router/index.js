import { createRouter, createWebHistory } from 'vue-router'
import Home from '@/views/Home.vue'
import Index from '@/views/users/Index.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home,
      children: []
    },
    {
      path: '/users',
      name: 'users-index',
      component: Index,
    },
  ],
})

export default router
