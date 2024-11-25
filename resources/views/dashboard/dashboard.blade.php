<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #4e54c8;
            --secondary-color: #8f94fb;
            --dark-color: #1a1b3c;
            --light-color: #f0f3ff;
        }

        body {
            background: linear-gradient(135deg, var(--dark-color), #2a2b5c);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
            overflow-x: hidden;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            width: 280px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding-top: 20px;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .sidebar-brand {
            color: #ffffff;
            font-size: 1.5rem;
            padding: 20px 25px;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .sidebar-brand i {
            font-size: 2rem;
            color: var(--secondary-color);
        }

        .nav-item {
            margin: 5px 15px;
        }

        .sidebar-link {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            padding: 12px 20px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            transition: all 0.3s;
            margin: 5px 0;
        }

        .sidebar-link i {
            margin-right: 10px;
            font-size: 1.2rem;
        }

        .sidebar-link:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            transform: translateX(5px);
        }

        .sidebar-link.active {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
        }

        /* Main Content Styles */
        .main-content {
            margin-left: 280px;
            padding: 20px;
            color: white;
            transition: margin-left 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .page-title {
            font-size: 1.5rem;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 2px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        /* Card Styles */
        .card {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            padding: 15px;
            margin-bottom: 15px;
            transition: all 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            padding-bottom: 10px;
        }

        /* Logout Button */
        .logout-btn {
            position: absolute;
            bottom: 20px;
            width: 100%;
            padding: 0 25px;
        }

        .logout-btn button {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }

        .logout-btn button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        /* Tambahkan style untuk menyembunyikan teks logout */
        .sidebar.collapsed .logout-btn span {
            display: none;
        }

        .sidebar.collapsed .logout-btn {
            padding: 0 15px;
        }

        .sidebar.collapsed .logout-btn button {
            padding: 12px 0;
        }

        /* Table Styles */
        .table {
            color: #ffffff;
        }

        .table thead th {
            border-color: rgba(255, 255, 255, 0.1);
            font-weight: 600;
            color: #ffffff;
        }

        .table td {
            border-color: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.95);
        }

        /* Button Styles */
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
        }

        /* Animation */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .container-fluid {
            animation: fadeIn 0.5s ease-out;
        }

        /* Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.1);
        }

        ::-webkit-scrollbar-thumb {
            background: var(--secondary-color);
            border-radius: 4px;
        }

        /* Modal Styles */
        .modal-content {
            background: rgba(26, 27, 60, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: #ffffff;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-footer {
            border-top: 1px solid rgba(255, 255, 255, 0.1);
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            color: white;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: var(--secondary-color);
            color: white;
            box-shadow: none;
        }

        /* Tambahan style untuk sidebar collapsible */
        .sidebar.collapsed {
            width: 70px;
        }

        .sidebar.collapsed .sidebar-brand span,
        .sidebar.collapsed .sidebar-link span {
            display: none;
        }

        .sidebar.collapsed~.main-content {
            margin-left: 70px;
        }

        .toggle-sidebar {
            position: fixed;
            top: 20px;
            left: 280px;
            background: rgba(255, 255, 255, 0.1);
            border: none;
            color: white;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
        }

        .sidebar.collapsed~.toggle-sidebar {
            left: 70px;
        }

        /* Style untuk cards dashboard */
        .dashboard-cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 15px;
            margin-bottom: 20px;
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .stat-card > div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .stat-card i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.8;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .stat-card .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 5px 0;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .stat-card .stat-label {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .recent-uploads {
            margin-top: 5px;
        }

        .gallery-preview {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
            gap: 10px;
            margin-top: 10px;
            padding: 10px;
        }

        .gallery-item {
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            aspect-ratio: 1;
        }

        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
            transition: transform 0.3s ease;
        }

        .gallery-item:hover img {
            transform: scale(1.05);
        }

        /* Setelah div card recent-uploads, tambahkan section album */
        .card.albums-section {
            margin-top: 5px;
        }

        .album-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 15px;
            padding: 10px;
        }

        .album-card {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .album-thumbnail {
            position: relative;
            width: 100%;
            height: auto;
        }

        .album-thumbnail::before {
            content: "";
            display: block;
            padding-top: 75%;
            /* Untuk mempertahankan aspect ratio 4:3 */
        }

        .album-thumbnail img {
            width: 100%;
            height: auto;
            object-fit: contain;
            display: block;
        }

        .album-overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .album-overlay:hover {
            opacity: 1;
        }

        .photo-count {
            color: #ffffff;
            font-size: 1.2rem;
            font-weight: 600;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .album-info {
            padding: 10px;
        }

        .album-info h6 {
            font-size: 1rem;
            font-weight: 600;
            margin-bottom: 5px;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.1);
        }

        .album-info p {
            color: rgba(255, 255, 255, 0.9) !important;
            font-size: 0.9rem;
        }

        /* Tambahkan efek glow pada teks penting */
        .stat-value,
        .page-title,
        .card-header h5 {
            text-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }

        /* Style untuk modal preview gambar */
        #imagePreviewModal .modal-dialog {
            max-width: 90vw;
        }

        #imagePreviewModal .modal-content {
            background: rgba(0, 0, 0, 0.9);
        }

        #imagePreviewModal .btn-close-white {
            filter: brightness(0) invert(1);
        }

        #previewImage {
            max-height: 85vh;
            object-fit: contain;
        }

        /* Tambahkan cursor pointer untuk gambar yang bisa di-klik */
        .gallery-item img,
        .album-thumbnail img {
            cursor: pointer;
        }

        /* Animasi untuk modal */
        .modal.fade .modal-dialog {
            transform: scale(0.8);
            transition: transform 0.3s ease-out;
        }

        .modal.show .modal-dialog {
            transform: scale(1);
        }

        .no-transition {
            transition: none !important;
        }

        .no-transition * {
            transition: none !important;
        }

        .album-wrapper {
            position: relative;
        }

        .album-wrapper .btn-danger {
            opacity: 0;
            transition: opacity 0.3s ease;
            width: 32px;
            height: 32px;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .album-wrapper:hover .btn-danger {
            opacity: 1;
        }

        .album-wrapper .btn-danger:hover {
            transform: scale(1.1);
        }

        .empty-album-message {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border-radius: 15px;
            padding: 40px;
            text-align: center;
        }

        .empty-state {
            opacity: 0.7;
        }

        .empty-state i {
            display: block;
            margin-bottom: 10px;
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-state p {
            margin: 0;
            font-size: 1.1rem;
            color: rgba(255, 255, 255, 0.8);
        }

        .empty-album-cover {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 0.1);
            color: rgba(255, 255, 255, 0.7);
            position: absolute;
            top: 0;
            left: 0;
        }

        .empty-album-cover i {
            font-size: 2rem;
            margin-bottom: 10px;
        }

        .empty-album-cover p {
            margin: 0;
            font-size: 0.9rem;
        }

        .bottom-buttons {
            position: absolute;
            bottom: 20px;
            left: 0;
            right: 0;
            padding: 0 25px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .button-container {
            display: flex;
            flex-direction: column;
            gap: 10px;
            width: 100%;
            align-items: center;
        }

        .home-btn {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            text-decoration: none;
            text-align: center;
            max-width: 200px;
        }

        .home-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
            color: white;
        }

        .logout-btn {
            width: 100%;
            text-align: center;
        }

        .logout-btn button {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            background: linear-gradient(135deg, #ff6b6b, #ff8e8e);
            border: none;
            color: white;
            font-weight: 500;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            max-width: 200px;
        }

        .logout-btn button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 107, 107, 0.3);
        }

        /* Update untuk sidebar collapsed */
        .sidebar.collapsed .bottom-buttons {
            padding: 0 15px;
        }

        .sidebar.collapsed .home-btn span,
        .sidebar.collapsed .logout-btn span {
            display: none;
        }

        .sidebar.collapsed .home-btn,
        .sidebar.collapsed .logout-btn button {
            padding: 12px 0;
        }

        /* Efek hover yang lebih menarik untuk stat-card */
        .stat-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            padding: 20px;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .stat-card > div {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            width: 100%;
        }

        .stat-card i {
            font-size: 2.5rem;
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            opacity: 0.8;
            transition: all 0.3s ease;
            margin-top: 10px;
        }

        .stat-card .stat-value {
            font-size: 1.8rem;
            font-weight: 600;
            margin: 5px 0;
            color: #ffffff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.2);
        }

        .stat-card .stat-label {
            color: rgba(255, 255, 255, 0.95);
            font-size: 1rem;
            margin-bottom: 5px;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            border-color: rgba(255, 255, 255, 0.3);
        }

        .stat-card:hover i {
            transform: scale(1.1);
            opacity: 1;
        }

        /* Efek glow untuk judul */
        .page-title {
            color: #ffffff;
            text-shadow: 0 0 20px rgba(255, 255, 255, 0.2);
            font-weight: 600;
            letter-spacing: 1px;
        }

        /* Efek hover yang lebih menarik untuk sidebar links */
        .sidebar-link {
            position: relative;
            overflow: hidden;
        }

        .sidebar-link::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(
                90deg,
                transparent,
                rgba(255, 255, 255, 0.1),
                transparent
            );
            transition: 0.5s;
        }

        .sidebar-link:hover::before {
            left: 100%;
        }

        /* Efek hover yang lebih menarik untuk tombol */
        .home-btn, .logout-btn button {
            position: relative;
            overflow: hidden;
            z-index: 1;
        }

        .home-btn::after, .logout-btn button::after {
            content: '';
            position: absolute;
            bottom: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.2) 0%, transparent 60%);
            opacity: 0;
            transition: 0.5s;
            z-index: -1;
        }

        .home-btn:hover::after, .logout-btn button:hover::after {
            opacity: 1;
            transform: scale(1.2);
        }

        /* Animasi untuk loading content */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .dashboard-cards {
            animation: fadeInUp 0.6s ease-out;
        }

        .stat-card {
            animation: fadeInUp 0.6s ease-out;
            animation-fill-mode: both;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }

        /* Efek scroll yang lebih smooth */
        .main-content {
            scroll-behavior: smooth;
        }

        /* Efek transisi yang lebih halus untuk sidebar */
        .sidebar {
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Efek hover untuk toggle button */
        .toggle-sidebar {
            transition: all 0.3s ease;
            backdrop-filter: blur(5px);
        }

        .toggle-sidebar:hover {
            background: rgba(255, 255, 255, 0.2);
            transform: scale(1.1);
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.15);
        }

        .glow-border {
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .text-glow {
            color: #fff;
            text-shadow: 0 0 10px rgba(255, 255, 255, 0.5);
        }

        .text-glow-subtle {
            color: rgba(255, 255, 255, 0.8);
            text-shadow: 0 0 5px rgba(255, 255, 255, 0.3);
        }

        .neon-border {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        .neon-border:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(31, 38, 135, 0.2);
        }

        .glass-reply {
            background: rgba(255, 255, 255, 0.07);
            border-radius: 10px;
            padding: 15px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .btn-neon-danger {
            background: linear-gradient(45deg, #ff6b6b, #ff8e8e);
            border: none;
            color: white;
            box-shadow: 0 2px 10px rgba(255, 107, 107, 0.3);
            transition: all 0.3s ease;
        }

        .btn-neon-danger:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(255, 107, 107, 0.5);
        }

        .btn-neon-primary {
            background: linear-gradient(45deg, #4e54c8, #8f94fb);
            border: none;
            color: white;
            box-shadow: 0 2px 10px rgba(78, 84, 200, 0.3);
            transition: all 0.3s ease;
        }

        .btn-neon-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(78, 84, 200, 0.5);
        }

        .neon-input input {
            background: rgba(255, 255, 255, 0.1);
            border: 1px solid rgba(255, 255, 255, 0.2);
            color: white;
        }

        .neon-input input:focus {
            background: rgba(255, 255, 255, 0.15);
            border-color: rgba(255, 255, 255, 0.3);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.1);
        }

        .comment-content, .reply-content {
            color: rgba(255, 255, 255, 0.9);
            line-height: 1.6;
        }

        .gallery-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 15px;
        }

        .photo-item {
            flex: 1 1 calc(20% - 10px);
            max-width: calc(20% - 10px);
            position: relative;
            border-radius: 8px;
            overflow: hidden;
            background: rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
            cursor: pointer;
        }

        .photo-item:hover {
            transform: scale(1.05);
        }

        .photo-item img {
            width: 100%;
            height: 150px;
            object-fit: cover;
        }

        .photo-item p {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px;
            margin: 0;
            font-size: 0.9rem;
            text-align: center;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="sidebar">
        <div class="sidebar-brand">
            <i class="bi bi-camera"></i>
            <span>Galeri</span>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}">
                    <i class="bi bi-speedometer2"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.index') }}" class="sidebar-link {{ Request::is('admin*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i>
                    <span>Manajemen Admin</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('kategori.index') }}" class="sidebar-link {{ Request::is('kategori*') ? 'active' : '' }}">
                    <i class="bi bi-grid"></i>
                    <span>Kategori</span>
                </a>
            </li>

        </ul>
        <div class="bottom-buttons">
            <div class="button-container">
                
                <div class="logout-btn">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">
                            <i class="bi bi-box-arrow-right"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <button class="toggle-sidebar">
        <i class="bi bi-chevron-left"></i>
    </button>

    <div class="main-content">
        <div class="container-fluid">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <h2 class="page-title">@yield('title', 'Dashboard')</h2>

            @if(Request::is('dashboard'))
            <div class="dashboard-cards">
                <div class="stat-card">
                    <div>
                        <div class="stat-value">
                            @php
                                $totalPhotos = 0;
                                // Loop melalui setiap album untuk menghitung total foto
                                for ($i = 1; $i <= 3; $i++) {
                                    $totalPhotos += collect(Storage::disk('public')->files("photos/album_{$i}"))->count();
                                }
                                echo $totalPhotos;
                            @endphp
                        </div>
                        <div class="stat-label">Total Foto</div>
                    </div>
                    <i class="bi bi-image"></i>
                </div>

                <div class="stat-card">
                    <div>
                        <div class="stat-value">
                            {{ collect(Storage::disk('public')->files('albums'))
                                ->filter(function($file) {
                                    return str_contains($file, 'album_') && str_ends_with($file, '.json');
                                })->count() }}
                        </div>
                        <div class="stat-label">Album</div>
                    </div>
                    <i class="bi bi-folder"></i>
                </div>

                <div class="stat-card">
                    <div>
                        <div class="stat-value">{{ $adminCount }}</div>
                        <div class="stat-label">Admin</div>
                    </div>
                    <i class="bi bi-people"></i>
                </div>
            </div>

            <div class="card recent-uploads">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: #ffffff; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">Semua Foto</h5>
                    <a href="{{ route('photos.index') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-images"></i> Lihat Semua
                    </a>
                </div>
                <div class="card-body">
                    <div class="gallery-preview">
                        @php
                            $recentPhotos = collect();
                            // Loop melalui setiap album untuk mengambil foto
                            for ($i = 1; $i <= 3; $i++) {
                                $albumPhotos = collect(Storage::disk('public')->files("photos/album_{$i}"))
                                    ->map(function($file) {
                                        return [
                                            'url' => asset('storage/' . $file),
                                            'created_at' => Storage::disk('public')->lastModified($file)
                                        ];
                                    });
                                $recentPhotos = $recentPhotos->concat($albumPhotos);
                            }
                            // Urutkan foto berdasarkan waktu upload terbaru dan ambil 4 foto
                            $recentPhotos = $recentPhotos->sortByDesc('created_at')->take(4);
                        @endphp

                        @forelse($recentPhotos as $photo)
                            <div class="gallery-item">
                                <img src="{{ $photo['url'] }}" alt="Gallery" onclick="previewImage(`{{ $photo['url'] }}`)">
                            </div>
                        @empty
                            <div class="text-center text-white w-100">
                                <p>Belum ada foto yang diupload</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Setelah div card recent-uploads, tambahkan section album -->
            <div class="card albums-section">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0" style="color: #ffffff; text-shadow: 0 0 10px rgba(255, 255, 255, 0.3);">Album</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#createAlbumModal">
                        <i class="bi bi-plus-lg"></i> Tambah Album
                    </button>
                </div>
                <div class="card-body">
                    <div class="album-grid">
                        @php
                        // Ambil semua file album yang ada
                        $albumFiles = collect(Storage::disk('public')->files('albums'))
                        ->filter(function($file) {
                        return str_contains($file, 'album_') && str_ends_with($file, '.json');
                        })
                        ->map(function($file) {
                        $id = (int) str_replace(['albums/album_', '.json'], '', $file);
                        $albumInfo = json_decode(Storage::disk('public')->get($file), true);
                        $photos = collect(Storage::disk('public')->files("photos/album_{$id}"));

                        return [
                        'id' => $id,
                        'name' => $albumInfo['name'] ?? "Album {$id}",
                        'created_at' => $albumInfo['created_at'] ?? date('Y-m-d'),
                        'photo_count' => $photos->count(),
                        'cover' => $photos->first() ? asset('storage/' . $photos->first()) : null
                        ];
                        })
                        ->sortBy('id');
                        @endphp

                        @forelse($albumFiles as $album)
                        <div class="album-wrapper position-relative">
                            <a href="{{ route('album.show', $album['id']) }}" class="text-decoration-none">
                                <div class="album-card">
                                    <div class="album-thumbnail">
                                        @if($album['cover'])
                                        <img src="{{ $album['cover'] }}" alt="Album Cover">
                                        @else
                                        <div class="empty-album-cover">
                                            <i class="bi bi-images"></i>
                                            <p>Album Kosong</p>
                                        </div>
                                        @endif
                                        <div class="album-overlay">
                                            <span class="photo-count">
                                                <i class="bi bi-image"></i> {{ $album['photo_count'] }} Foto
                                            </span>
                                        </div>
                                    </div>
                                    <div class="album-info">
                                        <h6>{{ $album['name'] }}</h6>
                                        <p class="text-muted">Dibuat: {{ \Carbon\Carbon::parse($album['created_at'])->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </a>
                            <form action="{{ route('album.delete', $album['id']) }}"
                                method="POST"
                                class="position-absolute top-0 end-0 m-2"
                                onsubmit="return confirm('Apakah Anda yakin ingin menghapus album ini? Semua foto di dalamnya akan terhapus.')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-circle">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </form>
                        </div>
                        @empty
                        <div class="text-center text-white w-100 empty-album-message">
                            <div class="empty-state">
                                <i class="bi bi-images fs-1 mb-3"></i>
                                <p>Belum ada album. Silakan buat album baru.</p>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
            @endif

            @yield('content')
        </div>
    </div>

    <!-- Tambahkan modal untuk preview gambar -->
    <div class="modal fade" id="imagePreviewModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img src="" id="previewImage" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <!-- Tambahkan modal untuk membuat album baru (letakkan sebelum penutup body) -->
    <div class="modal fade" id="createAlbumModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Buat Album Baru</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('album.create') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="albumName" class="form-label">Nama Album</label>
                            <input type="text" class="form-control" id="albumName" name="name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Buat Album</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Modal untuk preview foto -->
    <div class="modal fade" id="photoModal" tabindex="-1" aria-labelledby="photoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-header border-0">
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0 text-center">
                    <img src="" id="modalImage" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Cek state sidebar dari localStorage saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const toggleBtn = document.querySelector('.toggle-sidebar');
            const icon = toggleBtn.querySelector('i');

            // Tambahkan class no-transition sebelum mengecek localStorage
            sidebar.classList.add('no-transition');

            // Ambil state sidebar dari localStorage
            const isSidebarCollapsed = localStorage.getItem('sidebarCollapsed') === 'true';

            // Terapkan state sesuai localStorage
            if (isSidebarCollapsed) {
                sidebar.classList.add('collapsed');
                icon.classList.replace('bi-chevron-left', 'bi-chevron-right');
            }

            // Force reflow
            sidebar.offsetHeight;

            // Hapus class no-transition
            sidebar.classList.remove('no-transition');

            // Event listener untuk toggle sidebar
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('collapsed');

                // Update icon
                if (icon.classList.contains('bi-chevron-left')) {
                    icon.classList.replace('bi-chevron-left', 'bi-chevron-right');
                } else {
                    icon.classList.replace('bi-chevron-right', 'bi-chevron-left');
                }

                // Simpan state ke localStorage
                localStorage.setItem('sidebarCollapsed', sidebar.classList.contains('collapsed'));
            });

            // Tambahkan event listener untuk preview gambar
            const galleryItems = document.querySelectorAll('.gallery-item img, .album-thumbnail img');
            const previewImage = document.getElementById('previewImage');
            const imageModal = new bootstrap.Modal(document.getElementById('imagePreviewModal'));

            galleryItems.forEach(item => {
                item.style.cursor = 'pointer';
                item.addEventListener('click', function() {
                    previewImage.src = this.src;
                    imageModal.show();
                });
            });
        });

        function showPhotoModal(imagePath) {
            document.getElementById('modalImage').src = imagePath;
            var photoModal = new bootstrap.Modal(document.getElementById('photoModal'));
            photoModal.show();
        }
    </script>
</body>

</html>