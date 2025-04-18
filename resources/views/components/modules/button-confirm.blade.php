<div x-data="{ showModal: false }" class="justify-center w-full inline-flex items-center ">
    {{-- Button --}}
    <div x-on:click="showModal = true" type="button"
        class="justify-center w-full inline-flex items-center rounded-md bg-white px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
        {{ $slot }}
    </div>

    {{-- Modal Dialog --}}
    <div x-cloak x-show="showModal" class="relative z-50" role="dialog" aria-modal="true">
        {{-- Modal Background Overlay --}}
        <div class="fixed inset-0"></div>
        {{-- Modal Content --}}
        <div class="fixed inset-0 z-10 w-screen overflow-y-auto">
            <div class="flex items-end justify-center min-h-full p-4 text-center sm:items-center sm:p-0">
                <div class="relative overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-lg"
                    @click.outside="showModal = false">
                    <div class="px-4 pt-5 pb-4 bg-white sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            {{-- Icon --}}
                            <div
                                class="flex items-center justify-center flex-shrink-0 w-12 h-12 mx-auto bg-red-100 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="w-6 h-6 text-red-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" aria-hidden="true">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m-9.303 3.376c-.866 1.5.217 3.374 1.948 3.374h14.71c1.73 0 2.813-1.874 1.948-3.374L13.949 3.378c-.866-1.5-3.032-1.5-3.898 0L2.697 16.126zM12 15.75h.007v.008H12v-.008z" />
                                </svg>
                            </div>
                            {{-- Modal Content --}}
                            <div class="mt-3 text-center sm:ml-4 sm:mt-0 sm:text-left">
                                <h3 class="text-base font-semibold leading-6 text-gray-900">
                                    Action Item?
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500">
                                        This action has not been implemented yet
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Modal Buttons --}}
                    <div class="flex flex-col gap-2 px-4 py-3 bg-gray-50 sm:flex-row-reverse sm:px-6">
                        {{-- Cancel Button --}}
                        <button x-on:click="showModal = false" type="button"
                            class="justify-center px-3 py-2 text-sm font-semibold text-gray-900 bg-white rounded-md shadow-sm cursor-pointer ring-1 ring-inset ring-gray-300 hover:bg-gray-100">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
