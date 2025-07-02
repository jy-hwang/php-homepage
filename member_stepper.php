<?php
/**
 * 스테퍼 컴포넌트
 * 각 페이지에서 include하여 사용
 * 
 * 사용법:
 * $current_step = 1; // 현재 단계 설정
 * include 'stepper.php';
 */

// 기본값 설정
if (!isset($current_step)) {
    $current_step = 1;
}

// 단계 정의 (필요에 따라 수정 가능)
$steps = [
    1 => [
        'title' => '약관동의',
        'url' => 'stipulation.php'
    ],
    2 => [
        'title' => '정보입력', 
        'url' => 'member_input.php'
    ],
    3 => [
        'title' => '가입완료',
        'url' => 'member_success.php'
    ]
];
?>

<!-- 스테퍼 CSS -->
<style>
.stepper-container {
    margin: 1rem 0;
    padding: 1rem 0;
}

.stepper {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    max-width: 600px;
    margin: 0 auto;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    flex: 1;
    cursor: pointer;
    transition: opacity 0.3s ease;
}

.step.disabled {
    cursor: not-allowed;
    opacity: 0.6;
}

.step.completed {
    cursor: pointer;
}

.step.final-step {
    cursor: default;
}

.step-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    position: relative;
    z-index: 2;
    transition: all 0.3s ease;
    margin-bottom: 8px;
}

.step-circle.completed {
    background-color: #28a745;
    color: white;
    box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.2);
}

.step-circle.active {
    background-color: #007bff;
    color: white;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.3);
    animation: pulse 2s infinite;
}

.step-circle.pending {
    background-color: #e9ecef;
    color: #6c757d;
    border: 2px solid #dee2e6;
}

.step-label {
    font-size: 0.85rem;
    text-align: center;
    color: #6c757d;
    transition: all 0.3s ease;
    font-weight: 500;
}

.step-label.active {
    color: #007bff;
    font-weight: bold;
}

.step-label.completed {
    color: #28a745;
    font-weight: 600;
}

.step-connector {
    position: absolute;
    top: 20px;
    left: 50%;
    width: 100%;
    height: 2px;
    background-color: #dee2e6;
    z-index: 1;
    transition: all 0.3s ease;
}

.step-connector.completed {
    background-color: #28a745;
}

.step:last-child .step-connector {
    display: none;
}

/* 반응형 디자인 */
@media (max-width: 576px) {
    .step-circle {
        width: 35px;
        height: 35px;
        font-size: 0.9rem;
    }
    
    .step-label {
        font-size: 0.75rem;
    }
    
    .step-connector {
        top: 17px;
    }
}

/* 애니메이션 */
@keyframes pulse {
    0% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0.7);
    }
    70% {
        box-shadow: 0 0 0 8px rgba(0, 123, 255, 0);
    }
    100% {
        box-shadow: 0 0 0 0 rgba(0, 123, 255, 0);
    }
}

.stepper-fade-in {
    animation: fadeInUp 0.6s ease-out;
}

@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>

<!-- 스테퍼 HTML -->
<div class="stepper-container">
    <div class="stepper stepper-fade-in">
        <?php foreach ($steps as $step_num => $step_data): 
            $circle_class = '';
            $label_class = '';
            $connector_class = '';
            $step_class = '';
            $clickable = true;
            
            if ($step_num < $current_step) {
                $circle_class = 'completed';
                $label_class = 'completed';
                $connector_class = 'completed';
                $step_class = 'completed';
                // 마지막 단계에서는 이전 단계 클릭 비활성화
                if ($current_step == count($steps)) {
                    $clickable = false;
                    $step_class .= ' disabled';
                }
            } elseif ($step_num == $current_step) {
                $circle_class = 'active';
                $label_class = 'active';
                // 마지막 단계일 때 특별 클래스 추가
                if ($current_step == count($steps)) {
                    $step_class = 'final-step';
                    $clickable = false;
                }
            } else {
                $circle_class = 'pending';
                $step_class = 'disabled';
                $clickable = false;
            }
        ?>
        <div class="step <?php echo $step_class; ?>" 
             <?php echo $clickable ? "onclick=\"stepClick({$step_num}, '{$step_data['url']}')\"" : ''; ?>>
            <div class="step-circle <?php echo $circle_class; ?>">
                <?php if ($step_num < $current_step): ?>
                    <i class="fas fa-check"></i>
                <?php else: ?>
                    <?php echo $step_num; ?>
                <?php endif; ?>
            </div>
            <div class="step-label <?php echo $label_class; ?>">
                <?php echo $step_data['title']; ?>
            </div>
            <?php if ($step_num < count($steps)): ?>
                <div class="step-connector <?php echo $connector_class; ?>"></div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- 스테퍼 JavaScript -->
<script>
function stepClick(stepNumber, stepUrl) {
    const currentStep = <?php echo $current_step; ?>;
    const maxStep = <?php echo count($steps); ?>;
    
    // 마지막 단계(가입완료)에서는 클릭 비활성화
    if (currentStep === maxStep) {
        console.log('가입이 완료되어 단계 이동이 제한됩니다.');
        return;
    }
    
    if (stepNumber <= currentStep) {
        // 이전 단계로 이동
        if (stepNumber < currentStep) {
            // 특정 단계는 되돌아가기 제한 (예: 가입완료에서 뒤로가기 방지)
            if (currentStep === maxStep) {
                alert('가입이 완료되어 이전 단계로 돌아갈 수 없습니다.');
                return;
            }
            
            if (confirm('이전 단계로 이동하시겠습니까?\n입력하신 정보가 유지되지 않습니다.')) {
                window.location.href = stepUrl;
            }
        } else if (stepNumber === currentStep) {
            // 현재 페이지는 클릭해도 아무 동작 안함
            console.log('현재 단계입니다.');
        }
    } else {
        // 미래 단계 클릭 시
        alert('이전 단계를 먼저 완료해주세요.');
    }
}

// 스테퍼 초기화 애니메이션
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    steps.forEach((step, index) => {
        step.style.animationDelay = (index * 0.1) + 's';
    });
});
</script>