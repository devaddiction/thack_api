# Require YAML module
require 'yaml'

# Read YAML file with box details
configuration = YAML.load_file('config.yaml')

Vagrant.require_version '>= 1.6.0'

Vagrant.configure(2) do |config|
    config.vm.box = configuration["box"]
    config.vm.hostname = configuration["hostname"]

    config.vm.network "private_network", ip: configuration["ip"]

    config.vm.provider configuration["provider"] do |vb|
        vb.name = configuration["name"]
        vb.memory = configuration["ram"]
        vb.gui = configuration["gui"]
        vb.cpus = configuration["cpus"]

        vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    end

    if Vagrant.has_plugin?('vagrant-hostmanager')
        hosts = Array.new()

        config.hostmanager.enabled           = true
        config.hostmanager.manage_host       = true
        config.hostmanager.ignore_private_ip = false
        config.hostmanager.include_offline   = false
        config.hostmanager.aliases           = hosts
    end

    if Vagrant.has_plugin?("vagrant-cachier")
        config.cache.scope = :box
    end

    config.vm.synced_folder "./", "/var/www/htdocs/", create: true, group: "www-data", owner: "www-data", :mount_options => ["dmode=777","fmode=666"]

    config.ssh.forward_agent = true

    config.vm.provision :shell, :path => "vagrant/install.sh"
    config.vm.provision :shell, :path => "vagrant/swapon.sh"
    config.vm.provision :shell, :path => "vagrant/scripts/php.sh"
    config.vm.provision :shell, :path => "vagrant/scripts/nginx.sh"
    config.vm.provision :shell, :path => "vagrant/postinstall.sh"
end
