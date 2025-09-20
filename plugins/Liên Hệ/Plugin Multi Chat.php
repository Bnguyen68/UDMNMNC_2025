<?php
/**
 * Plugin Name: Liên Hệ
 * Description: Tích hợp nhiều nền tảng chat: Messenger, Phone, Zalo, WhatsApp
 * Version: 1.0
 * Author: BinhNguyen
 */

// Ngăn truy cập trực tiếp
if (!defined('ABSPATH')) {
    exit;
}

class MultiChatWidget {
    
    public function __construct() {
        add_action('wp_footer', array($this, 'add_chat_widget'));
        add_action('wp_enqueue_scripts', array($this, 'enqueue_scripts'));
        add_action('admin_menu', array($this, 'add_admin_menu'));
        add_action('admin_init', array($this, 'register_settings'));
    }
    
    public function enqueue_scripts() {
        wp_enqueue_style('multi-chat-style', plugin_dir_url(__FILE__) . 'style.css');
    }
    
    public function add_chat_widget() {
        $messenger_id = get_option('mcw_messenger_id', '');
        $phone_number = get_option('mcw_phone_number', '');
        $zalo_id = get_option('mcw_zalo_id', '');
        $whatsapp_number = get_option('mcw_whatsapp_number', '');
        
        ?>
        <div class="multi-chat-widget">
            <div class="chat-options" id="chatOptions">
                <?php if ($messenger_id): ?>
                <a href="https://m.me/<?php echo esc_attr($messenger_id); ?>" target="_blank" class="chat-item messenger">
                    <div class="chat-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="M12 2C6.48 2 2 6.13 2 11.25c0 2.92 1.44 5.51 3.69 7.2V22l3.41-1.87c.9.25 1.85.37 2.9.37 5.52 0 10-4.13 10-9.25S17.52 2 12 2zm1.01 12.31l-2.59-2.77-5.06 2.77L10.44 8.7l2.65 2.77 5-2.77-5.08 5.61z"/>
                        </svg>
                    </div>
                    <span class="chat-label">Messenger</span>
                </a>
                <?php endif; ?>
                
                <?php if ($phone_number): ?>
                <a href="tel:<?php echo esc_attr($phone_number); ?>" class="chat-item phone">
                    <div class="chat-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="M6.62 10.79c1.44 2.83 3.76 5.15 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/>
                        </svg>
                    </div>
                    <span class="chat-label">Phone</span>
                </a>
                <?php endif; ?>
                
                <?php if ($zalo_id): ?>
                <a href="https://zalo.me/<?php echo esc_attr($zalo_id); ?>" target="_blank" class="chat-item zalo">
                    <div class="chat-icon">
                         <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="M12.49 10.2722v-.4496h1.3467v6.3218h-.7704a.576.576 0 01-.5763-.5729l-.0006.0005a3.273 3.273 0 01-1.9372.6321c-1.8138 0-3.2844-1.4697-3.2844-3.2823 0-1.8125 1.4706-3.2822 3.2844-3.2822a3.273 3.273 0 011.9372.6321l.0006.0005zM6.9188 7.7896v.205c0 .3823-.051.6944-.2995 1.0605l-.03.0343c-.0542.0615-.1815.206-.2421.2843L2.024 14.8h4.8948v.7682a.5764.5764 0 01-.5767.5761H0v-.3622c0-.4436.1102-.6414.2495-.8476L4.8582 9.23H.1922V7.7896h6.7266zm8.5513 8.3548a.4805.4805 0 01-.4803-.4798v-7.875h1.4416v8.3548H15.47zM20.6934 9.6C22.52 9.6 24 11.0807 24 12.9044c0 1.8252-1.4801 3.306-3.3066 3.306-1.8264 0-3.3066-1.4808-3.3066-3.306 0-1.8237 1.4802-3.3044 3.3066-3.3044zm-10.1412 5.253c1.0675 0 1.9324-.8645 1.9324-1.9312 0-1.065-.865-1.9295-1.9324-1.9295s-1.9324.8644-1.9324 1.9295c0 1.0667.865 1.9312 1.9324 1.9312zm10.1412-.0033c1.0737 0 1.945-.8707 1.945-1.9453 0-1.073-.8713-1.9436-1.945-1.9436-1.0753 0-1.945.8706-1.945 1.9436 0 1.0746.8697 1.9453 1.945 1.9453z"/>
                        </svg>
                    </div>
                    <span class="chat-label">Zalo</span>
                </a>
                <?php endif; ?>
                
                <?php if ($whatsapp_number): ?>
                <a href="https://wa.me/<?php echo esc_attr($whatsapp_number); ?>" target="_blank" class="chat-item whatsapp">
                    <div class="chat-icon">
                        <svg viewBox="0 0 24 24" width="24" height="24">
                            <path fill="currentColor" d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.893 3.085"/>
                        </svg>
                    </div>
                    <span class="chat-label">WhatsApp</span>
                </a>
                <?php endif; ?>
            </div>
            
            <button class="main-toggle" id="mainToggle">
                <span class="toggle-icon" id="toggleIcon">
                    <svg viewBox="0 0 24 24" width="28" height="28">
                        <path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/>
                    </svg>
                </span>
                <div class="notification-dot"></div>
            </button>
        </div>
        
        <style>
        .multi-chat-widget {
            position: fixed;
            right: 20px;
            bottom: 80px; /* Tăng khoảng cách để không bị đè bởi scroll top */
            z-index: 9999;
            font-family: Arial, sans-serif;
        }

        .chat-options {
            position: absolute;
            bottom: 70px;
            right: 0;
            display: flex;
            flex-direction: column;
            gap: 15px;
            opacity: 0;
            visibility: hidden;
            transform: translateY(20px);
            transition: all 0.3s ease;
        }

        .chat-options.active {
            opacity: 1;
            visibility: visible;
            transform: translateY(0);
        }

        .chat-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            background: white;
            border-radius: 50px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.15);
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            min-width: 120px;
        }

        .chat-item:hover {
            transform: translateX(-10px);
            box-shadow: 0 6px 25px rgba(0,0,0,0.2);
        }

        .chat-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            flex-shrink: 0;
        }

        .messenger .chat-icon {
            background: #0084FF;
        }

        .phone .chat-icon {
            background: #7CB342;
        }

        .zalo .chat-icon {
            background: #0078FF;
        }

        .whatsapp .chat-icon {
            background: #25D366;
        }

        .chat-label {
            font-size: 14px;
            font-weight: 500;
            color: #333;
            white-space: nowrap;
        }

        .main-toggle {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 20px rgba(0,0,0,0.3);
            transition: all 0.3s ease;
            position: relative;
            color: white;
        }

        .main-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 6px 25px rgba(0,0,0,0.4);
        }

        .toggle-icon {
            transition: transform 0.3s ease;
        }

        .toggle-icon.active {
            transform: rotate(45deg);
        }

        .notification-dot {
            position: absolute;
            top: 5px;
            right: 5px;
            width: 12px;
            height: 12px;
            background: #ff4757;
            border-radius: 50%;
            border: 2px solid white;
            animation: pulse 2s infinite;
        }

        @keyframes pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.2); }
            100% { transform: scale(1); }
        }

        @media (max-width: 768px) {
            .multi-chat-widget {
                right: 15px;
                bottom: 75px; /* Tăng khoảng cách trên mobile */
            }
            
            .chat-item {
                min-width: 100px;
                padding: 10px 14px;
            }
            
            .chat-icon {
                width: 35px;
                height: 35px;
            }
            
            .main-toggle {
                width: 55px;
                height: 55px;
            }
        }
        </style>
        
        <script>
        document.addEventListener('DOMContentLoaded', function() {
            let isMultiChatOpen = false;
            const chatOptions = document.getElementById('chatOptions');
            const toggleIcon = document.getElementById('toggleIcon');
            const mainToggle = document.getElementById('mainToggle');

            function toggleMultiChat() {
                isMultiChatOpen = !isMultiChatOpen;
                
                if (isMultiChatOpen) {
                    chatOptions.classList.add('active');
                    toggleIcon.classList.add('active');
                    toggleIcon.innerHTML = '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>';
                } else {
                    chatOptions.classList.remove('active');
                    toggleIcon.classList.remove('active');
                    toggleIcon.innerHTML = '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>';
                }
            }

            // Thêm event listener cho button
            if (mainToggle) {
                mainToggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    toggleMultiChat();
                });
            }

            // Đóng menu khi click bên ngoài
            document.addEventListener('click', function(event) {
                const chatWidget = document.querySelector('.multi-chat-widget');
                if (chatWidget && !chatWidget.contains(event.target) && isMultiChatOpen) {
                    toggleMultiChat();
                }
            });
        });
        </script>
        <?php
    }
    
    public function add_admin_menu() {
        add_options_page(
            'Liên Hệ Settings',
            'Liên Hệ Widget',
            'manage_options',
            'lien-he-widget',
            array($this, 'admin_page')
        );
    }
    
    public function register_settings() {
        register_setting('mcw_settings', 'mcw_messenger_id');
        register_setting('mcw_settings', 'mcw_phone_number');
        register_setting('mcw_settings', 'mcw_zalo_id');
        register_setting('mcw_settings', 'mcw_whatsapp_number');
    }
    
    public function admin_page() {
        ?>
        <div class="wrap">
            <h1>Liên Hệ Settings</h1>
            <form method="post" action="options.php">
                <?php settings_fields('mcw_settings'); ?>
                <table class="form-table">
                    <tr>
                        <th scope="row">Messenger ID</th>
                        <td><input type="text" name="mcw_messenger_id" value="<?php echo esc_attr(get_option('mcw_messenger_id')); ?>" placeholder="your-page-id" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Phone Number</th>
                        <td><input type="text" name="mcw_phone_number" value="<?php echo esc_attr(get_option('mcw_phone_number')); ?>" placeholder="+84123456789" /></td>
                    </tr>
                    <tr>
                        <th scope="row">Zalo ID</th>
                        <td><input type="text" name="mcw_zalo_id" value="<?php echo esc_attr(get_option('mcw_zalo_id')); ?>" placeholder="your-zalo-id" /></td>
                    </tr>
                    <tr>
                        <th scope="row">WhatsApp Number</th>
                        <td><input type="text" name="mcw_whatsapp_number" value="<?php echo esc_attr(get_option('mcw_whatsapp_number')); ?>" placeholder="84123456789" /></td>
                    </tr>
                </table>
                <?php submit_button(); ?>
            </form>
        </div>
        <?php
    }
}

new MultiChatWidget();
?>