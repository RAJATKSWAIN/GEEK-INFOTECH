<?php
require_once __DIR__ . '/../core/config.php';

class FinanceService {
    private PDO $db;

    public function __construct() {
        $this->db = db();
    }

    public function collectFee(array $payload): bool {
        $this->db->beginTransaction();

        try {
            $sqlLedger = "INSERT INTO GIAMS_FEE_LEDGER
                        (FEE_ID, RECEIPT_NO, PAYMENT_DATE, AMOUNT_PAID, PAYMENT_MODE, REMARKS, MAKER_ID)
                        VALUES (:fee_id, :receipt_no, :payment_date, :amount_paid, :payment_mode, :remarks, :maker_id)";
            $this->db->prepare($sqlLedger)->execute([
                ':fee_id' => $payload['fee_id'],
                ':receipt_no' => $payload['receipt_no'],
                ':payment_date' => $payload['payment_date'],
                ':amount_paid' => $payload['amount_paid'],
                ':payment_mode' => $payload['payment_mode'],
                ':remarks' => $payload['remarks'] ?? null,
                ':maker_id' => $payload['maker_id'],
            ]);

            $this->db->prepare("UPDATE GIAMS_FEE_MASTER SET PAID_AMOUNT = PAID_AMOUNT + :amount WHERE FEE_ID = :fee_id")
                ->execute([':amount' => $payload['amount_paid'], ':fee_id' => $payload['fee_id']]);

            $this->db->commit();
            return true;
        } catch (Throwable $e) {
            $this->db->rollBack();
            throw $e;
        }
    }

    public function ledger(int $studentId): array {
        $sql = "SELECT l.*
                FROM GIAMS_FEE_LEDGER l
                INNER JOIN GIAMS_FEE_MASTER m ON m.FEE_ID = l.FEE_ID
                WHERE m.STUDENT_ID = :student_id
                ORDER BY l.TRX_ID DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':student_id' => $studentId]);
        return $stmt->fetchAll();
    }
}
