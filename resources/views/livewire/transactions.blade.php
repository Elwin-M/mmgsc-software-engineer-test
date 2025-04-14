<div class="px-4">
    {{-- Care about people's approval and you will be their prisoner. --}}

    <main class="p-4 sm:px-6 lg:flex-auto lg:px-0">
        <div class="mx-auto max-w-2xl space-y-16 sm:space-y-20 lg:mx-0 lg:max-w-none">
            <div>
                <div class="md:flex md:items-center md:justify-between">
                    <h2 class="text-base font-semibold leading-7 text-gray-900">All Transaction</h2>
                    <div class="mt-3 flex md:right-0 md:top-3 md:mt-0 sm:w-1/5 gap-3">
                        <div type="button"
                            class="justify-center w-full inline-flex items-center rounded-md bg-white px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Print</div>
                        <div type="button"
                            class="justify-center w-full inline-flex items-center rounded-md bg-white px-4 py-3 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                            Export</div>
                    </div>
                </div>

                <div class="md:flex md:items-center gap-4 justify-stretch mt-4">
                    <div class="w-full">
                        <label for="date" class="block text-sm/6 font-medium text-gray-900">Date</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="date" name="date" id="date"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="date">
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="date" class="block text-sm/6 font-medium text-gray-900">ATM ID</label>
                        <div class="mt-0">
                            <div
                                class="grid grow-1 grid-cols-1 focus-within:relative rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <select id="aid" name="aid" aria-label="aid"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>ALL ATMS</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="cpn" class="block text-sm/6 font-medium text-gray-900">CUSTOMER PAN
                            NUMBER</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="number" name="cpn" id="cpn"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="Partial or full card number">
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="eca" class="block text-sm/6 font-medium text-gray-900">EMV CHIP AID</label>
                        <div class="mt-0">
                            <div
                                class="grid grow-1 grid-cols-1 focus-within:relative rounded-md bg-white outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <select id="eca" name="eca" aria-label="eca"
                                    class="col-start-1 row-start-1 w-full appearance-none rounded-md py-1.5 pr-7 pl-3 text-base text-gray-500 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                                    <option>All applications</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                                <svg class="pointer-events-none col-start-1 row-start-1 mr-2 size-5 self-center justify-self-end text-gray-500 sm:size-4"
                                    viewBox="0 0 16 16" fill="currentColor" aria-hidden="true" data-slot="icon">
                                    <path fill-rule="evenodd"
                                        d="M4.22 6.22a.75.75 0 0 1 1.06 0L8 8.94l2.72-2.72a.75.75 0 1 1 1.06 1.06l-3.25 3.25a.75.75 0 0 1-1.06 0L4.22 7.28a.75.75 0 0 1 0-1.06Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </div>
                    </div>

                    <div class="w-full">
                        <label for="tsn" class="block text-sm/6 font-medium text-gray-900">TRANSACTION SERIAL
                            NUMBER</label>
                        <div class="mt-0">
                            <div
                                class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 has-[input:focus-within]:outline-2 has-[input:focus-within]:-outline-offset-2 has-[input:focus-within]:outline-indigo-600">
                                <input type="number" name="tsn" id="tsn"
                                    class="block min-w-0 grow py-1.5 pr-3 pl-1 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6"
                                    placeholder="4 digit number">
                            </div>
                        </div>
                    </div>


                </div>


                <div
                    class="mt-6 space-y-6 divide-y divide-gray-100 border-t border-gray-200 text-sm leading-6 bg-white rounded-md">
                        <div class="overflow-x-auto px-4">
                            <div class="-mx-4"> 
                                <table class="min-w-full divide-y divide-gray-300">
                                    <thead>
                                        <tr>
                                            <th scope="col"
                                                class="pl-4 sm:pl-6 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Date</th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">ATM ID
                                            </th>
                                            <th scope="col"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                Customer PAN</th>

                                            <th scope="col" colspan="3"
                                                class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                                <div class="flex flex-row gap-x-4">
                                                    <div class="flex-1 text-gray-900 place-self-center">
                                                        Description
                                                    </div>
                                                    <div class="flex-1 text-gray-900 place-self-center">
                                                        Code
                                                    </div>
                                                    <div class="flex-1 text-gray-900 place-self-center">
                                                        Search Box
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>

                                    <tbody class="divide-y divide-gray-200 bg-white">
                                        <tr>
                                            <td class="whitespace-nowrap py-5 pl-4 pr-3 text-sm sm:pl-6">
                                                <div class="text-gray-900">2025-04-14</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">ATM123</div>
                                            </td>
                                            <td class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                <div class="text-gray-900">**** **** **** 1234</div>
                                            </td>
                                            <td colspan="3"
                                                class="whitespace-nowrap px-3 py-5 text-sm text-gray-500">
                                                {{--  --}}
                                                <div class="flex flex-row gap-x-4">
                                                    <div class="flex-1 text-gray-900">
                                                        <div>test<br>test123</div>
                                                    </div>
                                                    <div class="flex-1 text-left text-gray-900">
                                                        1111
                                                    </div>
                                                    <div class="flex-1 text-left text-gray-900">
                                                        <span class="sr-only">spacer</span>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>

                                </table>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </main>

</div>