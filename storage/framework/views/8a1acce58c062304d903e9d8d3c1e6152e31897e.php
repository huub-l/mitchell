<div class="<?php echo $bg; ?>" x-data="{ search: <?php echo $search; ?> }">
  <div class="container px-6 mx-auto lg:px-8">
    <div class="py-8">

      
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 sm:gap-8 lg:grid-cols-3 xl:grid-cols-4 query-filters">

        <?php
          $issue_get = [];
          if(isset($_GET['issue'])) {
            $issue_get = explode(',', $_GET[ 'issue' ]);
          }
        ?>

        <div class="relative" x-data="{ open: false, search: <?php echo $search; ?> }">
          <div>
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
              <div class="pl-6">Issue</div>
              <!-- Heroicon name: solid/chevron-down -->
              <div class="px-3 py-1" :class="{ 'bg-c-blue-150' : search, 'bg-c-blue-300' : !search }">
                <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </div>

        
          <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg" x-show="open" x-on:click.away="open = false" :class="{ 'bg-c-gray-50' : search, 'bg-c-blue-300' : !search }"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
            x-cloak>
            <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <div class="flex flex-col mt-2 space-y-2 font-whyte filters" data-filter="issue" :class="{ 'text-c-blue-300' : search, 'text-white' : !search }">
                <?php $__currentLoopData = $issue_filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="issue-filter">
                    <label class="inline-flex items-center">
                      <input type="checkbox" value="<?php echo $key; ?>" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" <?php echo e(in_array($key, $issue_get) ? 'checked' : ""); ?> />
                      <span class="ml-8 text-lg"><?php echo e($value); ?></span>
                    </label>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>

        <?php
          $tag_get = [];
          if(isset($_GET['label'])) {
            $tag_get = explode(',', $_GET[ 'label' ]);
          }
        ?>

        
        
        <?php if($tag_filters): ?>
          <div class="relative tag-filter-container" x-data="{ open: false, search: <?php echo $search; ?> }">
            <div>
              <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
                <div class="pl-6">Tags</div>
                <!-- Heroicon name: solid/chevron-down -->
                <div class="px-3 py-1" :class="{ 'bg-c-blue-150' : search, 'bg-c-blue-300' : !search }">
                  <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                  </svg>
                </div>
              </button>
            </div>
          
            <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg" x-show="open" x-on:click.away="open = false" :class="{ 'bg-c-gray-50' : search, 'bg-c-blue-300' : !search }"
              x-transition:enter="transition ease-out duration-100"
              x-transition:enter-start="transform opacity-0 scale-95"
              x-transition:enter-end="transform opacity-100 scale-100"
              x-transition:leave="transition ease-in duration-75"
              x-transition:leave-start="transform opacity-100 scale-100"
              x-transition:leave-end="transform opacity-0 scale-95"
              x-cloak>
              <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
                <div class="flex flex-col mt-2 space-y-6 text-white filters font-whyte" data-filter="label">
                  <?php if(isset($tag_filters['top'])): ?>
                    <div>
                      <div class="mb-4 text-lg font-bold">Top Tags</div>
                      <div class="flex flex-col space-y-4">
                        <?php $__currentLoopData = $tag_filters['top']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="filter">
                            <label class="">
                              <input type="checkbox" value="<?php echo $key; ?>" class="hidden w-5 h-5 border rounded-sm top-tag bg-c-blue-400 border-c-blue-200" <?php echo e(in_array($key, $tag_get) ? 'checked' : ""); ?>/>
                              <div class="w-3/4 px-6 py-2 text-lg text-center border cursor-pointer bg-c-blue-400 border-c-blue-200"><?php echo e($value); ?></div>
                            </label>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                  
                  <?php if(isset($tag_filters['tags'])): ?>
                    <div>
                      <div class="mb-4 text-lg font-bold">All Tags</div>
                        <?php $__currentLoopData = $tag_filters['tags']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <div class="filter">
                            <label class="inline-flex items-center">
                              <input type="checkbox" value="<?php echo $key; ?>" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" <?php echo e(in_array($key, $tag_get) ? 'checked' : ""); ?> />
                              <span class="ml-8 text-lg"><?php echo e($value); ?></span>
                            </label>
                          </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </div>
                    </div>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>

        <?php endif; ?>

        <?php if(is_search()): ?>
        <?php
          $author_get = [];
          if(isset($_GET['author'])) {
            $author_get = explode(',', $_GET[ 'author' ]);
          }
        ?>
        
        <div class="relative" x-data="{ open: false, search: <?php echo $search; ?> }">
          <div>
            <button x-on:click="open = !open" type="button" class="inline-flex items-center justify-between w-full text-base font-medium text-gray-400 bg-white font-whyte focus:outline-none" id="options-menu" aria-haspopup="true" aria-expanded="true">
              <div class="pl-6">Author</div>
              <!-- Heroicon name: solid/chevron-down -->
              <div class="px-3 py-1" :class="{ 'bg-c-blue-150' : search, 'bg-c-blue-300' : !search }">
                <svg class="w-10 h-10 text-white transform" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" :class="{ 'rotate-180' : open }">
                  <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </div>
            </button>
          </div>

        
          <div class="absolute left-0 z-30 w-full origin-top-left shadow-lg" x-show="open" x-on:click.away="open = false" :class="{ 'bg-c-gray-50' : search, 'bg-c-blue-300' : !search }"
            x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100"
            x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95"
          x-cloak>
            <div class="p-6" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
              <div class="flex flex-col mt-2 space-y-2 font-whyte filters" data-filter="author" :class="{ 'text-c-blue-300' : search, 'text-white' : !search }">
                <?php $__currentLoopData = $author_filters; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <div class="author-filter">
                    <label class="inline-flex items-center">
                      <input type="checkbox" value="<?php echo $item['id']; ?>" class="w-5 h-5 border rounded-sm bg-c-blue-400 border-c-blue-200" <?php echo e(in_array($item['id'], $author_get) ? 'checked' : ""); ?> />
                      <span class="ml-8 text-lg"><?php echo e($item['name']); ?></span>
                    </label>
                  </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </div>
            </div>
          </div>
        </div>

        <?php endif; ?>

      </div> <!--- END GRID --->

    </div>
  </div>
</div>







<?php /**PATH /Users/edward/Desktop/wordpress/mitchell/wp-content/themes/mitchell/resources/views/partials/filters.blade.php ENDPATH**/ ?>