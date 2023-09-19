// vite.config.js
import { defineConfig } from "file:///E:/xampp/htdocs/boxify/node_modules/vite/dist/node/index.js";
import laravel, { refreshPaths } from "file:///E:/xampp/htdocs/boxify/node_modules/laravel-vite-plugin/dist/index.mjs";
var vite_config_default = defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/app.css", "resources/css/filament.css", "resources/js/app.js"],
      refresh: [...refreshPaths, "app/Http/Livewire/**"]
    })
  ]
});
export {
  vite_config_default as default
};
//# sourceMappingURL=data:application/json;base64,ewogICJ2ZXJzaW9uIjogMywKICAic291cmNlcyI6IFsidml0ZS5jb25maWcuanMiXSwKICAic291cmNlc0NvbnRlbnQiOiBbImNvbnN0IF9fdml0ZV9pbmplY3RlZF9vcmlnaW5hbF9kaXJuYW1lID0gXCJFOlxcXFx4YW1wcFxcXFxodGRvY3NcXFxcYm94aWZ5XCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ZpbGVuYW1lID0gXCJFOlxcXFx4YW1wcFxcXFxodGRvY3NcXFxcYm94aWZ5XFxcXHZpdGUuY29uZmlnLmpzXCI7Y29uc3QgX192aXRlX2luamVjdGVkX29yaWdpbmFsX2ltcG9ydF9tZXRhX3VybCA9IFwiZmlsZTovLy9FOi94YW1wcC9odGRvY3MvYm94aWZ5L3ZpdGUuY29uZmlnLmpzXCI7aW1wb3J0IHsgZGVmaW5lQ29uZmlnIH0gZnJvbSAndml0ZSdcbmltcG9ydCBsYXJhdmVsLCB7IHJlZnJlc2hQYXRocyB9IGZyb20gJ2xhcmF2ZWwtdml0ZS1wbHVnaW4nXG5cbmV4cG9ydCBkZWZhdWx0IGRlZmluZUNvbmZpZyh7XG4gICAgcGx1Z2luczogW1xuICAgICAgICBsYXJhdmVsKHtcbiAgICAgICAgICAgIGlucHV0OiBbJ3Jlc291cmNlcy9jc3MvYXBwLmNzcycsJ3Jlc291cmNlcy9jc3MvZmlsYW1lbnQuY3NzJywgJ3Jlc291cmNlcy9qcy9hcHAuanMnXSxcbiAgICAgICAgICAgIHJlZnJlc2g6IFsuLi5yZWZyZXNoUGF0aHMsICdhcHAvSHR0cC9MaXZld2lyZS8qKiddLFxuICAgICAgICB9KSxcbiAgICBdLFxufSlcbiJdLAogICJtYXBwaW5ncyI6ICI7QUFBNFAsU0FBUyxvQkFBb0I7QUFDelIsT0FBTyxXQUFXLG9CQUFvQjtBQUV0QyxJQUFPLHNCQUFRLGFBQWE7QUFBQSxFQUN4QixTQUFTO0FBQUEsSUFDTCxRQUFRO0FBQUEsTUFDSixPQUFPLENBQUMseUJBQXdCLDhCQUE4QixxQkFBcUI7QUFBQSxNQUNuRixTQUFTLENBQUMsR0FBRyxjQUFjLHNCQUFzQjtBQUFBLElBQ3JELENBQUM7QUFBQSxFQUNMO0FBQ0osQ0FBQzsiLAogICJuYW1lcyI6IFtdCn0K
