<div>
  <nav class="bg-gray-800/50">
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
      <div class="flex h-16 items-center justify-between">
        <div class="flex items-center">
          <div class="shrink-0">
            <img src="https://tailwindcss.com/plus-assets/img/logos/mark.svg?color=indigo&shade=500" alt="Your Company"
              class="size-8" />
          </div>
          <div class="hidden md:block">
            <div class="ml-10 flex items-baseline space-x-4">
              <x-nav-link href="{{ route('user.home') }}" :active="request()->routeIs('user.home')">Home</x-nav-link>
              <x-nav-link href="{{ route('user.kontak') }}"
                :active="request()->routeIs('user.kontak')">Kontak</x-nav-link>
              <x-nav-link href="{{ route('user.profil') }}"
                :active="request()->routeIs('user.profil')">Profil</x-nav-link>
              <x-nav-link href="{{ route('user.student') }}"
                :active="request()->routeIs('user.student')">Student</x-nav-link>
              <x-nav-link href="{{ route('user.guardian') }}"
                :active="request()->routeIs('user.guardian')">Guardian</x-nav-link>
              <x-nav-link href="{{ route('user.classroom') }}"
                :active="request()->routeIs('user.classroom')">Classrooms</x-nav-link>
              <x-nav-link href="{{ route('user.teacher') }}"
                :active="request()->routeIs('user.teacher')">Teacher</x-nav-link>
              <x-nav-link href="{{ route('user.subject') }}"
                :active="request()->routeIs('user.subject')">Subject</x-nav-link>

            </div>
          </div>
        </div>

        <div class="hidden md:block">
          <div class="ml-4 flex items-center md:ml-6">
            <el-dropdown class="relative ml-3">
              <button
                class="relative flex max-w-xs items-center rounded-full focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">
                <span class="absolute -inset-1.5"></span>
                <span class="sr-only">Open user menu</span>
                <img
                  src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                  alt="" class="size-8 rounded-full outline -outline-offset-1 outline-white/10" />
              </button>

              <el-menu anchor="bottom end" popover
                class="w-48 origin-top-right rounded-md bg-gray-800 py-1 outline-1 -outline-offset-1 outline-white/10 transition transition-discrete [--anchor-gap:--spacing(2)] data-closed:scale-95 data-closed:transform data-closed:opacity-0 data-enter:duration-100 data-enter:ease-out data-leave:duration-75 data-leave:ease-in">
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Your
                  profile</a>
                <a href="#"
                  class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Settings</a>
                <a href="#" class="block px-4 py-2 text-sm text-gray-300 focus:bg-white/5 focus:outline-hidden">Sign
                  out</a>
              </el-menu>
            </el-dropdown>
          </div>
        </div>
      </div>
    </div>
  </nav>
</div>