export default [
    { 
        path: 'users',
        name: 'users-index',
        component: () => import('@/views/admin/users/Index.vue')
      },
      { 
        path: 'users/create',
        name: 'users-create',
        component: () => import('@/views/admin/users/Create.vue')
      },
      { 
        path: 'users/:id',
        name: 'users-show',
        component: () => import('@/views/admin/users/Show.vue')
      },
      { 
        path: 'users/:id/edit',
        name: 'users-edit',
        component: () => import('@/views/admin/users/Edit.vue')
      },
];